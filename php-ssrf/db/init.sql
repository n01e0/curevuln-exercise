CREATE DATABASE sampledb;
\connect sampledb;

DROP TABLE IF EXISTS article;
CREATE TABLE article (
    id SERIAL NOT NULL,
    title TEXT NOT NULL,
    content TEXT,
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS webhook;
CREATE TABLE webhook (
    id SERIAL,
    url TEXT,
    PRIMARY KEY (id)
);

INSERT INTO article (title, content) VALUES ('SSRFデビュー', 'こんにちはこんにちは');
INSERT INTO article (title, content) VALUES ('今日は僕の誕生日です！', 'ワイワイ');
INSERT INTO article (title, content) VALUES ('みなさんはどう思いますか？', 'ウェイ');
INSERT INTO article (title, content) VALUES ('あけましておめでとう！！', '');

INSERT INTO webhook (id, url) VALUES (1, 'https://example.com/');
