use crate::{
    app::App,
    models::Post,
    routes::RouteName,
    templates::{self, John},
};
use axum::{
    extract::{self, Query, State},
    response::{IntoResponse, Redirect, Response},
};
use lettre::Message;
use lettre::{message::header::ContentType, Transport};
use serde::Deserialize;
use std::{env, str::FromStr};
use strum_macros::EnumString;
use validator::Validate;

pub async fn about(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::About);
    templates::HtmlTemplate(templates::AboutTemplate { app, john: John {} })
}

pub async fn menu(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Menu);
    templates::HtmlTemplate(templates::MenuTemplate { app })
}

pub async fn intro(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Intro);
    templates::HtmlTemplate(templates::IntroTemplate { app })
}

pub async fn blank(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Blank);
    templates::HtmlTemplate(templates::BlankTemplate { app })
}

pub async fn blog(State(app): State<App>) -> Response {
    let app = app.clone().set_route(RouteName::Blog);

    let result = sqlx::query_as::<_, Post>(
        "SELECT * FROM posts ORDER BY published_at DESC LIMIT 5 OFFSET 0",
    )
    .fetch_all(&app.db)
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

pub async fn clear(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Clear);
    (
        [
            ("HX-Retarget", "#output"),
            ("HX-Reswap", "innerHTML show:top"),
        ],
        templates::HtmlTemplate(templates::ClearTemplate { app }),
    )
}

#[derive(Deserialize)]
pub struct CommandErrorQuery {
    cmd: String,
}

pub async fn command_error(
    State(app): State<App>,
    Query(query): Query<CommandErrorQuery>,
) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::CommandError);
    templates::HtmlTemplate(templates::CommandErrorTemplate { 
        app, 
        command: query.cmd,
    })
}

pub async fn help(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Help);
    templates::HtmlTemplate(templates::HelpTemplate { app })
}

pub async fn social(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Social);
    templates::HtmlTemplate(templates::SocialTemplate { app })
}

pub async fn built_with(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::BuiltWith);
    templates::HtmlTemplate(templates::BuiltWithTemplate { app })
}

pub async fn contact_form(State(app): State<App>) -> impl IntoResponse {
    let app = app.clone().set_route(RouteName::Contact);
    templates::HtmlTemplate(templates::ContactTemplate { app })
}

#[derive(Deserialize)]
pub struct ExecuteForm {
    pub input: String,
}

#[derive(Debug, Deserialize, Validate)]
pub struct ContactForm {
    #[validate(length(min = 1, message = "Your name is required"))]
    pub name: String,
    #[validate(length(min = 1, message = "Your email is required"), email)]
    pub email: String,
    #[validate(length(min = 1, message = "Your message is required"))]
    pub message: String,
    // Honeypot field - should be empty for legitimate submissions
    #[serde(default)]
    pub website: String,
}

#[derive(Debug, EnumString, PartialEq)]
#[strum(serialize_all = "kebab-case")]
enum Command {
    About,
    Blog,
    BuiltWith,
    Clear,
    Contact,
    Help,
    Intro,
    Menu,
    Social,
}

pub async fn execute(
    State(_app): State<App>,
    extract::Form(form): extract::Form<ExecuteForm>,
) -> Response {
    let mut input = form.input.split_whitespace();

    match input.next() {
        // Handle empty input by showing a new prompt line
        None => RouteName::Blank.into_response(),
        Some(command) => match Command::from_str(command) {
            Ok(command) => match command {
                Command::About => RouteName::About.into_response(),
                Command::Blog => RouteName::Blog.into_response(),
                Command::BuiltWith => RouteName::BuiltWith.into_response(),
                Command::Clear => RouteName::Clear.into_response(),
                Command::Contact => RouteName::Contact.into_response(),
                Command::Help => RouteName::Help.into_response(),
                Command::Intro => RouteName::Intro.into_response(),
                Command::Menu => RouteName::Menu.into_response(),
                Command::Social => RouteName::Social.into_response(),
            },
            // Return error response for invalid command
            Err(_error) => {
                let redirect_url = format!("/command-error?cmd={}", command);
                Redirect::to(&redirect_url).into_response()
            },
        },
    }
}

pub async fn send_message(
    State(app): State<App>,
    extract::Form(form): extract::Form<ContactForm>,
) -> Response {
    let app = app.clone().set_route(RouteName::Contact);

    if let Err(message) = form.validate() {
        return templates::HtmlTemplate(templates::ErrorTemplate {
            app,
            input: "contact".to_string(),
            message: message.to_string(),
        })
        .into_response();
    }

    // Check honeypot field - if filled, it's likely a bot
    if !form.website.is_empty() {
        // Silently reject but show success to confuse bots
        return templates::HtmlTemplate(templates::SuccessTemplate {
            app,
            input: "contact".to_string(),
            message: "Message sent successfully!".to_string(),
        })
        .into_response();
    }

    let from = format!("{} <{}>", form.name, form.email);

    let to = format!(
        "{} <{}>",
        env::var("MAIL_FROM_NAME").expect("MAIL_FROM_NAME not set"),
        env::var("MAIL_FROM_ADDRESS").expect("MAIL_FROM_ADDRESS not set")
    );

    let email = Message::builder()
        .from(from.parse().unwrap())
        .to(to.parse().unwrap())
        .subject("Message via contact form")
        .header(ContentType::TEXT_PLAIN)
        .body(form.message)
        .unwrap();

    // Send the email
    match app.mailer.send(&email) {
        Ok(message) => templates::HtmlTemplate(templates::SuccessTemplate {
            app,
            input: "contact".to_string(),
            message: format!("{:?}", message),
        })
        .into_response(),
        Err(message) => templates::HtmlTemplate(templates::ErrorTemplate {
            app,
            input: "contact".to_string(),
            message: message.to_string(),
        })
        .into_response(),
    }
}
