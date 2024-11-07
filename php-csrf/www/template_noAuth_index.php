<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Us List - Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="head">
        <div class="top-button">
            <a href="/"><p>login</p></a>
        </div>
    </div>
    <div class="app">
        <h1>和菓子ショップ なごみ</h1>
        <h1>Login</h1>
        <form class="pure-form pure-form-aligned contacts" action="auth.php" method="post">
            <fieldset>
                <div class="pure-control-group">
                    <label for="login_id">LoginID</label><br>
                    <input id="loginId" type="text" name="loginID" placeholder="LoginID"><br>
                </div>

                <div class="pure-control-group">
                    <label for="foo">Password</label><br>
                    <input id="password" name="password" type="password" placeholder="password"><br>
                </div>

                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">送信</button>
                </div>
            </fieldset>
        </form>
        <?php echo "<p>".$error."</p>"; ?>
    </div>
    <div class="scenario">
        <h1>CSRFの脆弱性に利用するHTMLファイル</h1>
        <h3>
            <p>このHTMLファイルはCSRFの脆弱性を利用し、当サービスの重要な処理をユーザーの意図しない形で行うように細工をしてあります。<br>是非試してください。</p>
            <a href="/data/csrf_trap.html" download="csrf_trap.html">ファイルをダウンロード</a>
        </h3>
    </div>
</body>
</html>
