CREATE SEQUENCE IF NOT EXISTS posts_id_seq;

CREATE TABLE "public"."posts" (
    "id" int8 NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
    "url" varchar(255) NOT NULL,
    "site" varchar(255) NOT NULL,
    "title" varchar(255) NOT NULL,
    "excerpt" text NOT NULL,
    "image" varchar(255) NOT NULL,
    "tags" jsonb NOT NULL DEFAULT '[]'::json,
    "published_at" timestamptz NOT NULL,
    PRIMARY KEY ("id")
);
