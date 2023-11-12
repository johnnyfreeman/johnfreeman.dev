use axum::response::{IntoResponse, Response};

use crate::{app::App, templates};

pub struct AppError {
    app: App,
    error: anyhow::Error,
}

impl IntoResponse for AppError {
    fn into_response(self) -> Response {
        templates::HtmlTemplate(templates::ErrorTemplate {
            app: self.app,
            input: "".to_string(),
            message: format!("{}", self.error),
        })
        .into_response()
    }
}
