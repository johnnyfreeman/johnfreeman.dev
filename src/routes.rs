use axum::response::{IntoResponse, Redirect, Response};
use strum_macros::EnumIter;
use strum_macros::EnumString;

#[derive(Clone, Debug, EnumIter, EnumString, PartialEq)]
#[strum(serialize_all = "kebab-case")]
pub enum RouteName {
    About,
    Blank,
    Blog,
    BuiltWith,
    Clear,
    CommandError,
    Contact,
    Execute,
    Exit,
    Help,
    Home,
    Intro,
    Menu,
    Social,
}

impl std::fmt::Display for RouteName {
    fn fmt(&self, f: &mut std::fmt::Formatter<'_>) -> std::fmt::Result {
        match self {
            RouteName::About => write!(f, "/about"),
            RouteName::BuiltWith => write!(f, "/built-with"),
            RouteName::Blank => write!(f, "/blank"),
            RouteName::Blog => write!(f, "/blog"),
            RouteName::Clear => write!(f, "/clear"),
            RouteName::CommandError => write!(f, "/command-error"),
            RouteName::Contact => write!(f, "/contact"),
            RouteName::Execute => write!(f, "/execute"),
            RouteName::Exit => write!(f, "/exit"),
            RouteName::Help => write!(f, "/help"),
            RouteName::Home => write!(f, "/"),
            RouteName::Intro => write!(f, "/intro"),
            RouteName::Menu => write!(f, "/menu"),
            RouteName::Social => write!(f, "/social"),
        }
    }
}

impl IntoResponse for RouteName {
    fn into_response(self) -> Response {
        Redirect::to(&self.to_string()).into_response()
    }
}
