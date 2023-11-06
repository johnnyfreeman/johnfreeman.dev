use crate::{
    routes::{App, Route, RouteName},
    templates::{self, John},
};
use axum::{
    extract,
    response::{IntoResponse, Response},
};
use serde::Deserialize;
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

pub async fn clear() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Clear);
    templates::HtmlTemplate(templates::ClearTemplate { app })
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
        None => Route::from(RouteName::Clear).into_response(),
        Some(command) => match Command::from_str(command) {
            Ok(command) => match command {
                Command::About => Route::from(RouteName::About).into_response(),
                Command::Blog => Route::from(RouteName::Blog).into_response(),
                Command::BuiltWith => Route::from(RouteName::BuiltWith).into_response(),
                Command::Clear => Route::from(RouteName::Clear).into_response(),
                Command::Contact => Route::from(RouteName::Contact).into_response(),
                Command::Features => Route::from(RouteName::Features).into_response(),
                Command::Help => Route::from(RouteName::Help).into_response(),
                Command::Intro => Route::from(RouteName::Intro).into_response(),
                Command::Menu => Route::from(RouteName::Menu).into_response(),
                Command::Projects => Route::from(RouteName::Projects).into_response(),
                Command::Social => Route::from(RouteName::Social).into_response(),
                Command::WhoAmI => Route::from(RouteName::WhoAmI).into_response(),
                Command::Su => Route::from(RouteName::Su).into_response(),
                Command::Exit => Route::from(RouteName::Exit).into_response(),
            },
            // TODO: return error response
            Err(_error) => Route::from(RouteName::Help).into_response(),
        },
    }
}
