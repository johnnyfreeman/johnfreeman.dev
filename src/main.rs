mod auth;
mod controllers;
mod models;
mod routes;
mod templates;

use axum::{
    routing::{get, post},
    Router,
};
use dotenvy::dotenv;
use sqlx::postgres::PgPoolOptions;
use std::env;
use std::{net::SocketAddr, path::PathBuf};
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

    let database_url = env::var("DATABASE_URL").expect("DATABASE_URL not set");
    let pool = PgPoolOptions::new()
        .max_connections(50)
        .connect(&database_url)
        .await
        .unwrap_or_else(|_| panic!("Could not connect to DATABASE_URL {}", database_url));

    sqlx::migrate!()
        .run(&pool)
        .await
        .expect("Could not run migrations");

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

    let addr = SocketAddr::from(([0, 0, 0, 0], 3000));

    tracing::debug!("listening on {}", addr);

    axum::Server::bind(&addr)
        .serve(router.into_make_service())
        .await
        .unwrap();
}
