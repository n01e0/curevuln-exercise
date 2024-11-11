CREATE DATABASE blog;
\connect blog;

DROP TABLE IF EXISTS article;
CREATE TABLE article (
    id SERIAL NOT NULL,
    title TEXT NOT NULL,
    content TEXT,
    PRIMARY KEY (id)
);

INSERT INTO article (title, content) VALUES ('ウェイ', '<h1>こんにちはこんにちは</h1>');
INSERT INTO article (title, content) VALUES ('今日は僕の誕生日です！', '<a href="#">link</a>');
INSERT INTO article (title, content) VALUES ('みなさんはどう思いますか？', 'ワイワイ');
INSERT INTO article (title, content) VALUES ('あけましておめでとう！！', 'ウェイ;');
