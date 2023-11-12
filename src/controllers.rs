use crate::{
    models::Post,
    routes::{App, RouteName},
    templates::{self, John},
};
use axum::{
    extract::{self, State},
    response::{IntoResponse, Response},
};
use lettre::message::header::ContentType;
use lettre::transport::smtp::authentication::Credentials;
use lettre::{Message, SmtpTransport, Transport};
use serde::Deserialize;
use sqlx::PgPool;
use std::env;
use std::str::FromStr;
use strum_macros::EnumString;
use validator::Validate;

pub async fn about() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::About);
    templates::HtmlTemplate(templates::AboutTemplate { app, john: John {} })
}

pub async fn intro() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Intro);
    templates::HtmlTemplate(templates::IntroTemplate { app })
}

pub async fn blank() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Blank);
    templates::HtmlTemplate(templates::BlankTemplate { app })
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

pub async fn contact_form() -> impl IntoResponse {
    let app = App::new().set_route(RouteName::Contact);
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

pub async fn execute(extract::Form(form): extract::Form<ExecuteForm>) -> Response {
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

pub async fn send_message(extract::Form(form): extract::Form<ContactForm>) -> Response {
    let app = App::new().set_route(RouteName::Contact);

    if let Err(message) = form.validate() {
        return templates::HtmlTemplate(templates::ErrorTemplate {
            app,
            input: "contact".to_string(),
            message: message.to_string(),
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

    let creds = Credentials::new(
        env::var("MAIL_USERNAME").expect("MAIL_USERNAME not set"),
        env::var("MAIL_PASSWORD").expect("MAIL_PASSWORD not set"),
    );

    let mailer = SmtpTransport::relay(&env::var("MAIL_HOST").expect("MAIL_HOST not set"))
        .unwrap()
        .port(
            env::var("MAIL_PORT")
                .expect("MAIL_PORT not set")
                .parse::<u16>()
                .expect("Could not convert MAIL_PORT into a u16"),
        )
        // .credentials(creds)
        .tls(lettre::transport::smtp::client::Tls::None)
        .build();

    // Send the email
    match mailer.send(&email) {
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
