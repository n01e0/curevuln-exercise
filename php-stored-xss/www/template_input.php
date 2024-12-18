<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: / ");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Us List - Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <style media="screen" type="text/css">

        p {
            margin: 0px;
        }
        label{
            margin: 0;
        }
        body {
            text-align: center;
        }
        body > .app > .contacts{
            width: 60%;
            margin: auto;
            margin-top: 3.5px;
            margin-bottom: 3.5px;
        }
        body > .app > .contacts > .title{
            padding: 10px;
            background-color: #6472c370;
            box-shadow: -2px 1px 9px #0000007a;
        }
        body > .app > .contacts > .content{
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.13);
        }
        .pure-form-aligned .pure-control-group label{
            text-align: center;

        }
        .pure-form-aligned .pure-control-group input, .pure-form-aligned .pure-control-group textarea{
            width: 100%;
        }
        .pure-form-aligned .pure-controls{
                margin: auto;
        }
    </style>
</head>
<body>
    <div class="app">
        <h1>お問い合わせフォーム</h1>
        <form class="pure-form pure-form-aligned contacts" action="next.php" method="get">
            <fieldset>
                <div class="pure-control-group">
                    <label for="title">お問い合わせタイトル</label><br>
                    <input id="title" type="text" name="title" placeholder="Title"><br>
                </div>

                <div class="pure-control-group">
                    <label for="foo">お問い合わせ内容</label><br>
                    <textarea id="content" name="content" type="text"></textarea><br>
                </div>

                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">送信</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
