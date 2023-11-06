use crate::{
    routes::App,
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
    let app = App::new().set_route("about");
    templates::HtmlTemplate(templates::AboutTemplate { app, john: John {} })
}

pub async fn intro() -> impl IntoResponse {
    let app = App::new().set_route("intro");
    templates::HtmlTemplate(templates::IntroTemplate { app })
}

pub async fn clear() -> impl IntoResponse {
    let app = App::new().set_route("clear");
    templates::HtmlTemplate(templates::ClearTemplate { app })
}

pub async fn help() -> impl IntoResponse {
    let app = App::new().set_route("help");
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
    let app = App::new();
    let mut input = form.input.split_whitespace();

    match input.next() {
        None => app.route("about").clone().into_response(),
        Some(command) => match Command::from_str(command) {
            Ok(command) => match command {
                Command::About => app.route("about").clone().into_response(),
                Command::Blog => app.route("blog").clone().into_response(),
                Command::BuiltWith => app.route("built-with").clone().into_response(),
                Command::Clear => app.route("clear").clone().into_response(),
                Command::Contact => app.route("contact").clone().into_response(),
                Command::Features => app.route("features").clone().into_response(),
                Command::Help => app.route("help").clone().into_response(),
                Command::Intro => app.route("intro").clone().into_response(),
                Command::Menu => app.route("menu").clone().into_response(),
                Command::Projects => app.route("projects").clone().into_response(),
                Command::Social => app.route("social").clone().into_response(),
                Command::WhoAmI => app.route("whoami").clone().into_response(),
                Command::Su => app.route("su").clone().into_response(),
                Command::Exit => app.route("exit").clone().into_response(),
            },
            // TODO: render error
            Err(_error) => app.route("help").clone().into_response(),
        },
    }
}
