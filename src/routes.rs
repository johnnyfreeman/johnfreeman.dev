use crate::{auth::user::User, controllers};
use axum::{
    response::{IntoResponse, Redirect, Response},
    routing::{get, post, MethodRouter},
};
use std::collections::BTreeMap;

pub fn routes() -> RouteMap {
    RouteMap::from([
        ("about", Route("/about", get(controllers::about))),
        ("blog", Route("/blog", get(controllers::help))),
        ("built-with", Route("/built-with", get(controllers::help))),
        ("contact", Route("/contact", get(controllers::help))),
        ("clear", Route("/clear", get(controllers::clear))),
        ("execute", Route("/execute", post(controllers::execute))),
        ("exit", Route("/exit", get(controllers::help))),
        ("features", Route("/features", get(controllers::help))),
        ("help", Route("/help", get(controllers::help))),
        ("home", Route("/", get(controllers::intro))),
        ("intro", Route("/intro", get(controllers::intro))),
        ("menu", Route("/menu", get(controllers::help))),
        ("projects", Route("/projects", get(controllers::help))),
        ("social", Route("/social", get(controllers::help))),
        ("su", Route("/su", get(controllers::help))),
        ("whoami", Route("/whoami", get(controllers::help))),
    ])
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

pub type RouteMap = BTreeMap<&'static str, Route>;

pub struct App {
    pub route: Option<Route>,
    pub user: Option<User>,
    pub routes: RouteMap,
    pub csrf: &'static str,
}

impl App {
    pub fn new() -> Self {
        Self {
            route: None,
            routes: routes(),
            user: None,
            csrf: "34r82oirfj",
        }
    }

    pub fn current_route(&self) -> &Route {
        self.route.as_ref().expect("Current route should be set")
    }

    pub fn route(&self, key: &str) -> &Route {
        self.routes.get(key).expect("Route should exist")
    }

    pub fn set_route(mut self, key: &str) -> Self {
        self.route = Some(self.routes.get(key).expect("Route should exist")).cloned();

        self
    }
}
