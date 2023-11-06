use crate::routes::{App, RouteName};
use askama::Template;
use axum::{
    http::StatusCode,
    response::{Html, IntoResponse, Response},
};
use chrono::{TimeZone, Utc};
use chrono_humanize::HumanTime;

pub struct HtmlTemplate<T>(pub T);

impl<T> IntoResponse for HtmlTemplate<T>
where
    T: Template,
{
    fn into_response(self) -> Response {
        match self.0.render() {
            Ok(html) => Html(html).into_response(),
            Err(err) => (
                StatusCode::INTERNAL_SERVER_ERROR,
                format!("Failed to render template. Error: {}", err),
            )
                .into_response(),
        }
    }
}

pub struct John {}

impl John {
    pub fn full_name(&self) -> &'static str {
        return "John Freeman";
    }

    pub fn nick_name(&self) -> &'static str {
        return "John";
    }

    pub fn email(&self) -> &'static str {
        return "john@johnfreeman.dev";
    }

    pub fn birth(&self) -> HumanTime {
        return Utc.with_ymd_and_hms(1985, 09, 07, 0, 0, 0).unwrap().into();
    }

    pub fn rv_life(&self) -> HumanTime {
        return Utc.with_ymd_and_hms(2018, 07, 01, 0, 0, 0).unwrap().into();
    }

    pub fn coding_passion(&self) -> HumanTime {
        return Utc.with_ymd_and_hms(1998, 01, 01, 0, 0, 0).unwrap().into();
    }
}

#[derive(Template)]
#[template(path = "about.html")]
pub struct AboutTemplate {
    pub app: App,
    pub john: John,
}

#[derive(Template)]
#[template(path = "intro.html")]
pub struct IntroTemplate {
    pub app: App,
}

#[derive(Template)]
#[template(path = "help.html")]
pub struct HelpTemplate {
    pub app: App,
}

#[derive(Template)]
#[template(path = "clear.html")]
pub struct ClearTemplate {
    pub app: App,
}
