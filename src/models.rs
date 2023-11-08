use chrono::{DateTime, Utc};
use serde::{Deserialize, Serialize};
use sqlx::{types::Json, FromRow, PgPool};

#[derive(FromRow, Deserialize, Serialize)]
pub struct Post {
    pub id: i64,
    pub url: String,
    pub site: String,
    pub title: String,
    pub excerpt: String,
    pub image: String,
    pub tags: Json<Vec<String>>,
    pub published_at: DateTime<Utc>,
}

#[sqlx::test(fixtures("posts"))]
async fn post_can_be_deserialized(pool: PgPool) -> sqlx::Result<()> {
    let sql = "SELECT * FROM posts".to_string();

    let post = sqlx::query_as::<_, Post>(&sql).fetch_one(&pool).await?;

    assert_eq!(&vec!["test".to_string()], post.tags.as_ref());
    assert_eq!(
        "2023-11-07 05:04:31 UTC",
        post.published_at.to_string().as_str()
    );

    Ok(())
}
