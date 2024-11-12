<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    header("X-XSS-Protection: 0;");

    if (!isset($_SESSION['id'])) {
        header("Location: / ");
        exit();
    }
    require 'common.php';
    require 'template_input.php';
?>
