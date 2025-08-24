use crate::{auth::user::User, routes::RouteName};
use lettre::transport::smtp::authentication::Credentials;
use lettre::SmtpTransport;
use sqlx::postgres::PgPoolOptions;
use sqlx::PgPool;
use std::env;

#[derive(Clone)]
pub struct App {
    pub route: Option<RouteName>,
    pub user: Option<User>,
    pub csrf: &'static str,
    pub db: PgPool,
    pub mailer: SmtpTransport,
}

impl App {
    pub async fn new() -> Self {
        let database_url = env::var("DATABASE_URL").expect("DATABASE_URL not set");
        let db = PgPoolOptions::new()
            .max_connections(50)
            .connect(&database_url)
            .await
            .unwrap_or_else(|_| panic!("Could not connect to DATABASE_URL {}", database_url));

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
            .credentials(creds)
            .tls(lettre::transport::smtp::client::Tls::None)
            .build();

        Self {
            route: None,
            user: None,
            csrf: "34r82oirfj",
            db,
            mailer,
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
