ARG RUST_VERSION=1.71.0
ARG NODE_MAJOR=20

FROM rust:${RUST_VERSION}-slim-bullseye AS rust
WORKDIR /app
COPY . .

RUN apt-get update -y && \
  apt-get install -y pkg-config libssl-dev

RUN --mount=type=bind,source=src,target=src \
    --mount=type=bind,source=Cargo.toml,target=Cargo.toml \
    --mount=type=bind,source=Cargo.lock,target=Cargo.lock \
    --mount=type=cache,target=/app/target/ \
    --mount=type=cache,target=/usr/local/cargo/registry/ \
    <<EOF
set -e
cargo build --locked --release
cp ./target/release/johnfreeman-dev /bin/johnfreeman-dev
EOF

FROM node:${NODE_MAJOR} AS node

WORKDIR /app
COPY . .
RUN npm install
RUN npx tailwindcss -i ./assets/css/app.css -o ./public/css/app.css --minify

FROM debian:bullseye-slim AS final

ENV PUBLIC_DIR=/var/www

ARG UID=10001
RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "/nonexistent" \
    --shell "/sbin/nologin" \
    --no-create-home \
    --uid "${UID}" \
    appuser

RUN mkdir /var/www
RUN chown -R appuser:appuser /var/www
RUN chmod -R 0755 /var/www

USER appuser

COPY --from=rust /bin/johnfreeman-dev /bin/
COPY --from=node /app/public /var/www

EXPOSE 3000

CMD ["/bin/johnfreeman-dev"]
