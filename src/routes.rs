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
    Contact,
    Execute,
    Exit,
    Features,
    Help,
    Home,
    Intro,
    Menu,
    Projects,
    Social,
    Su,
    #[strum(serialize = "whoami")]
    WhoAmI,
}

impl std::fmt::Display for RouteName {
    fn fmt(&self, f: &mut std::fmt::Formatter<'_>) -> std::fmt::Result {
        match self {
            RouteName::About => write!(f, "/about"),
            RouteName::BuiltWith => write!(f, "/built-with"),
            RouteName::Blank => write!(f, "/blank"),
            RouteName::Blog => write!(f, "/blog"),
            RouteName::Clear => write!(f, "/clear"),
            RouteName::Contact => write!(f, "/contact"),
            RouteName::Execute => write!(f, "/execute"),
            RouteName::Exit => write!(f, "/exit"),
            RouteName::Features => write!(f, "/features"),
            RouteName::Help => write!(f, "/help"),
            RouteName::Home => write!(f, "/"),
            RouteName::Intro => write!(f, "/intro"),
            RouteName::Menu => write!(f, "/menu"),
            RouteName::Projects => write!(f, "/projects"),
            RouteName::Social => write!(f, "/social"),
            RouteName::Su => write!(f, "/su"),
            RouteName::WhoAmI => write!(f, "/whoami"),
        }
    }
}

impl IntoResponse for RouteName {
    fn into_response(self) -> Response {
        Redirect::to(&self.to_string()).into_response()
    }
}
