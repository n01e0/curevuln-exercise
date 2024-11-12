<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("X-XSS-Protection: 0;");

if (!isset($_SESSION['id'])) {
    header("Location: / ");
    exit();
}
session_destroy();
header("Location: / ");
exit();
