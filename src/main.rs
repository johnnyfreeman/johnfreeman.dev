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
use std::{env, path::PathBuf};
use tokio::net::TcpListener;
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
        .route("/built-with", get(controllers::built_with))
        .route("/blank", get(controllers::blank))
        .route("/blog", get(controllers::blog))
        .route("/clear", get(controllers::clear))
        .route(
            "/contact",
            get(controllers::contact_form).post(controllers::send_message),
        )
        .route("/execute", post(controllers::execute))
        .route("/help", get(controllers::help))
        .route("/", get(controllers::intro))
        .route("/intro", get(controllers::intro))
        .route("/menu", get(controllers::menu))
        .route("/social", get(controllers::help))
        .with_state(app)
        .fallback_service(
            ServeDir::new(PathBuf::from(
                env::var("PUBLIC_DIR").unwrap_or("./public".to_string()),
            ))
            .append_index_html_on_directories(true),
        );

    let listener = TcpListener::bind(format!(
        "0.0.0.0:{}",
        env::var("PORT").unwrap_or("80".to_string())
    ))
    .await
    .unwrap();

    tracing::debug!("listening on {}", listener.local_addr().unwrap());

    axum::serve(listener, router).await.unwrap();
}
