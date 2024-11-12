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
    $dbh = connectDB();
    try {
        $query = "INSERT INTO contact (title, content) VALUES ( :title, :content );";
        $stmt  = $dbh->prepare($query);
        $stmt->bindParam(':title', $_GET['title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $_GET['content'], PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }
    require 'template_next.php';

?>
