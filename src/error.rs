use axum::response::{IntoResponse, Response};

use crate::templates;

pub struct AppError(anyhow::Error);

impl IntoResponse for AppError {
    fn into_response(self) -> Response {
        templates::HtmlTemplate(templates::ErrorTemplate {
            app: crate::routes::App::new(),
            input: "".to_string(),
            message: format!("{}", self.0),
        })
        .into_response()
    }
}

impl<E> From<E> for AppError
where
    E: Into<anyhow::Error>,
{
    fn from(err: E) -> Self {
        Self(err.into())
    }
}
