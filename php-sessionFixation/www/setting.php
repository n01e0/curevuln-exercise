<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("X-XSS-Protection: 0;");
