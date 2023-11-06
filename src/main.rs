mod auth;
mod controllers;
mod routes;
mod templates;

use crate::routes::{Route, RouteName};
use axum::Router;
use std::{net::SocketAddr, path::PathBuf};
use strum::IntoEnumIterator;
use tower_http::services::ServeDir;
use tracing_subscriber::{layer::SubscriberExt, util::SubscriberInitExt};

#[tokio::main]
async fn main() {
    tracing_subscriber::registry()
        .with(
            tracing_subscriber::EnvFilter::try_from_default_env()
                .unwrap_or_else(|_| "example_templates=debug".into()),
        )
        .with(tracing_subscriber::fmt::layer())
        .init();

    let mut router = Router::new().fallback_service(
        ServeDir::new(PathBuf::from(env!("CARGO_MANIFEST_DIR")).join("public"))
            .append_index_html_on_directories(true),
    );

    for route_name in RouteName::iter() {
        let Route(path, method_router) = Route::from(route_name);
        router = router.route(path, method_router);
    }

    let addr = SocketAddr::from(([127, 0, 0, 1], 3000));

    tracing::debug!("listening on {}", addr);

    axum::Server::bind(&addr)
        .serve(router.into_make_service())
        .await
        .unwrap();
}
