<?php
if ($_SESSION['id'] != '') {
    header('Location: /');
}
?>
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
            <a href="/"><p>Top</p></a>
            <a href="./login.php"><p>login</p></a>
        </div>
    </div>
    <div class="app">
        <h1>和菓子ショップ なごみ</h1>
        <h1>Login</h1>
        <form class="pure-form pure-form-aligned contacts" action="login.php" method="post">
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
        <?php
        if ($error) {
            echo "<p>".$error."</p>";
        }
        ?>
    </div>
</body>
</html>
