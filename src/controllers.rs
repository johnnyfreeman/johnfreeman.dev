use crate::{
    models::Post,
    routes::{App, RouteName},
    templates::{self, John},
};
use axum::{
    extract::{self, State},
    response::{IntoResponse, Response},
};
use serde::Deserialize;
use sqlx::PgPool;
use std::str::FromStr;
use strum_macros::EnumString;

pub async fn about() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::About);
    templates::HtmlTemplate(templates::AboutTemplate { app, john: John {} })
}

pub async fn intro() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Intro);
    templates::HtmlTemplate(templates::IntroTemplate { app })
}

pub async fn blog(State(pool): State<PgPool>) -> Response {
    let app = App::new().set_route(RouteName::Blog);

    let result = sqlx::query_as::<_, Post>(
        "SELECT * FROM posts ORDER BY published_at DESC LIMIT 5 OFFSET 0",
    )
    .fetch_all(&pool)
    .await;

    match result {
        Ok(posts) => {
            templates::HtmlTemplate(templates::BlogTemplate { app, posts }).into_response()
        }
        Err(message) => templates::HtmlTemplate(templates::ErrorTemplate {
            app,
            input: "blog".to_string(),
            message: message.to_string(),
        })
        .into_response(),
    }
}

pub async fn clear() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Clear);
    (
        [
            ("HX-Retarget", "#output"),
            ("HX-Reswap", "innerHTML show:top"),
        ],
        templates::HtmlTemplate(templates::ClearTemplate { app }),
    )
}

pub async fn help() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Help);
    templates::HtmlTemplate(templates::HelpTemplate { app })
}

#[derive(Deserialize)]
pub struct ExecuteInput {
    pub input: String,
}

#[derive(Debug, EnumString, PartialEq)]
#[strum(serialize_all = "kebab-case")]
enum Command {
    About,
    Blog,
    BuiltWith,
    Clear,
    Contact,
    Features,
    Help,
    Intro,
    Menu,
    Projects,
    Social,
    #[strum(serialize = "whoami")]
    WhoAmI,
    Su,
    Exit,
}

pub async fn execute(extract::Form(form): extract::Form<ExecuteInput>) -> Response {
    let mut input = form.input.split_whitespace();

    match input.next() {
        // TODO: instead of redirecting to clear when there is no input, we
        // should redirect to a dedicated "empty" route or "new_line" route
        None => RouteName::Clear.into_response(),
        Some(command) => match Command::from_str(command) {
            Ok(command) => match command {
                Command::About => RouteName::About.into_response(),
                Command::Blog => RouteName::Blog.into_response(),
                Command::BuiltWith => RouteName::BuiltWith.into_response(),
                Command::Clear => RouteName::Clear.into_response(),
                Command::Contact => RouteName::Contact.into_response(),
                Command::Features => RouteName::Features.into_response(),
                Command::Help => RouteName::Help.into_response(),
                Command::Intro => RouteName::Intro.into_response(),
                Command::Menu => RouteName::Menu.into_response(),
                Command::Projects => RouteName::Projects.into_response(),
                Command::Social => RouteName::Social.into_response(),
                Command::WhoAmI => RouteName::WhoAmI.into_response(),
                Command::Su => RouteName::Su.into_response(),
                Command::Exit => RouteName::Exit.into_response(),
            },
            // TODO: return error response
            Err(_error) => RouteName::Help.into_response(),
        },
    }
}
