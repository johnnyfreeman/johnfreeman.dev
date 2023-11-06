use std::str::FromStr;

use crate::{auth::user::User, controllers};
use axum::{
    response::{IntoResponse, Redirect, Response},
    routing::{get, post, MethodRouter},
};
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

#[derive(Clone)]
pub struct Route(pub &'static str, pub MethodRouter);

impl std::fmt::Display for Route {
    fn fmt(&self, f: &mut std::fmt::Formatter<'_>) -> std::fmt::Result {
        write!(f, "{}", self.0)
    }
}

impl IntoResponse for Route {
    fn into_response(self) -> Response {
        Redirect::to(self.0).into_response()
    }
}

impl From<RouteName> for Route {
    fn from(value: RouteName) -> Self {
        match value {
            RouteName::About => Route("/about", get(controllers::about)),
            RouteName::BuiltWith => Route("/built-with", get(controllers::help)),
            RouteName::Blog => Route("/blog", get(controllers::help)),
            RouteName::Clear => Route("/clear", get(controllers::clear)),
            RouteName::Contact => Route("/contact", get(controllers::help)),
            RouteName::Execute => Route("/execute", post(controllers::execute)),
            RouteName::Exit => Route("/exit", get(controllers::help)),
            RouteName::Features => Route("/features", get(controllers::help)),
            RouteName::Help => Route("/help", get(controllers::help)),
            RouteName::Home => Route("/", get(controllers::intro)),
            RouteName::Intro => Route("/intro", get(controllers::intro)),
            RouteName::Menu => Route("/menu", get(controllers::help)),
            RouteName::Projects => Route("/projects", get(controllers::help)),
            RouteName::Social => Route("/social", get(controllers::help)),
            RouteName::Su => Route("/su", get(controllers::help)),
            RouteName::WhoAmI => Route("/whoami", get(controllers::help)),
        }
    }
}

pub struct App {
    pub route: Option<Route>,
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

    pub fn current_route(&self) -> &Route {
        self.route.as_ref().expect("Current route should be set")
    }

    pub fn route(&self, route_name: RouteName) -> Route {
        Route::from(route_name)
    }

    pub fn set_route(mut self, route_name: RouteName) -> Self {
        self.route = Some(self.route(route_name));

        self
    }
}
