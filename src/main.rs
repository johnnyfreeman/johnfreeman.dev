mod auth;
mod controllers;
mod models;
mod routes;
mod templates;

use axum::{
    routing::{get, post},
    Router,
};
use sqlx::postgres::PgPoolOptions;
use std::env;
use std::{net::SocketAddr, path::PathBuf};
use tower_http::services::ServeDir;
use tracing_subscriber::{layer::SubscriberExt, util::SubscriberInitExt};

#[tokio::main]
async fn main() {
    dotenvy::dotenv().expect(".env should be valid");

    tracing_subscriber::registry()
        .with(
            tracing_subscriber::EnvFilter::try_from_default_env()
                .unwrap_or_else(|_| "example_templates=debug".into()),
        )
        .with(tracing_subscriber::fmt::layer())
        .init();

    let pool = PgPoolOptions::new()
        .max_connections(50)
        .connect(&env::var("DATABASE_URL").expect("DATABASE_URL not set"))
        .await
        .expect("Could not connect to DATABASE_URL");

    let router = Router::new()
        .route("/about", get(controllers::about))
        .route("/built-with", get(controllers::help))
        .route("/blog", get(controllers::blog))
        .route("/clear", get(controllers::clear))
        .route("/contact", get(controllers::help))
        .route("/execute", post(controllers::execute))
        .route("/exit", get(controllers::help))
        .route("/features", get(controllers::help))
        .route("/help", get(controllers::help))
        .route("/", get(controllers::intro))
        .route("/intro", get(controllers::intro))
        .route("/menu", get(controllers::help))
        .route("/projects", get(controllers::help))
        .route("/social", get(controllers::help))
        .route("/su", get(controllers::help))
        .route("/whoami", get(controllers::help))
        .with_state(pool)
        .fallback_service(ServeDir::new(
            PathBuf::from(env!("CARGO_MANIFEST_DIR")).join("public"),
        ));

    let addr = SocketAddr::from(([127, 0, 0, 1], 3000));

    tracing::debug!("listening on {}", addr);

    axum::Server::bind(&addr)
        .serve(router.into_make_service())
        .await
        .unwrap();
}
