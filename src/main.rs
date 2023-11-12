mod app;
mod auth;
mod controllers;
mod error;
mod models;
mod routes;
mod templates;

use crate::app::App;
use axum::{
    routing::{get, post},
    Router,
};
use dotenvy::dotenv;
use std::{env, net::SocketAddr, path::PathBuf};
use tower_http::services::ServeDir;
use tracing_subscriber::{layer::SubscriberExt, util::SubscriberInitExt};

#[tokio::main]
async fn main() {
    match dotenv() {
        Ok(path) => println!(".env read successfully from {}", path.display()),
        Err(e) => eprintln!("Could not load .env file: {e}"),
    };

    tracing_subscriber::registry()
        .with(
            tracing_subscriber::EnvFilter::try_from_default_env()
                .unwrap_or_else(|_| "example_templates=debug".into()),
        )
        .with(tracing_subscriber::fmt::layer())
        .init();

    let app = App::new().await;

    sqlx::migrate!()
        .run(&app.db)
        .await
        .expect("Could not run migrations");

    let router = Router::new()
        .route("/about", get(controllers::about))
        .route("/built-with", get(controllers::help))
        .route("/blank", get(controllers::blank))
        .route("/blog", get(controllers::blog))
        .route("/clear", get(controllers::clear))
        .route(
            "/contact",
            get(controllers::contact_form).post(controllers::send_message),
        )
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
        .with_state(app)
        .fallback_service(ServeDir::new(
            PathBuf::from(env!("CARGO_MANIFEST_DIR")).join("public"),
        ));

    let addr = SocketAddr::from(([0, 0, 0, 0], 3000));

    tracing::debug!("listening on {}", addr);

    axum::Server::bind(&addr)
        .serve(router.into_make_service())
        .await
        .unwrap();
}
