<?php
require 'setting.php';

if (!isset($_SESSION['id'])) {
    header("Location: / ");
    exit();
}
session_regenerate_id(true);

session_destroy();
header("Location: / ");
exit();
