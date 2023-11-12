use crate::auth::user::User;
use axum::response::{IntoResponse, Redirect, Response};
use strum_macros::EnumIter;
use strum_macros::EnumString;

#[derive(Debug, EnumIter, EnumString, PartialEq)]
#[strum(serialize_all = "kebab-case")]
pub enum RouteName {
    About,
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

pub struct App {
    pub route: Option<RouteName>,
    pub user: Option<User>,
    pub csrf: &'static str,
}

impl App {
    pub fn new() -> Self {
        Self {
            route: None,
            user: None,
            csrf: "34r82oirfj",
        }
    }

    pub fn current_route(&self) -> Option<&RouteName> {
        self.route.as_ref()
    }

    pub fn route(&self, route_name: RouteName) -> RouteName {
        route_name
    }

    pub fn set_route(mut self, route_name: RouteName) -> Self {
        self.route = Some(self.route(route_name));

        self
    }
}
