<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header("X-XSS-Protection: 0;");

function connectDB() {
    $dbname = 'pgsql:host=' . $_ENV['DATABASE_HOST'] . ';dbname=chat;port=' . $_ENV['DATABASE_PORT'];
    return new PDO($dbname, 'postgres', 'example');
}
?>
