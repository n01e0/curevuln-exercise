## 演習

### アプリケーションの起動

以下のコマンドをターミナルで実行しましょう

```bash
docker-compose up
```

### アプリケーションの概要

このアプリケーションはブログ投稿サービスです。  
ブログ本文（ `content` ）は Markdown で記述でき、HTMLとしてレンダリングされます。

### 攻撃

1. 本文に `[link](javascript:alert(1))` という内容で投稿します。
1. 記事を閲覧し `link` をクリックすると JavaScript が実行されます。
