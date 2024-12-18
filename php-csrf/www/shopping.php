<?php
require_once 'setting.php';
if ($_SESSION['id'] == '') {
    header("Location: / ");
    exit();
}
require 'common.php';

$dbh = connectDB();
$query = "SELECT * FROM users WHERE id = :userid ;";
$stmt  = $dbh->prepare($query);
$stmt->bindParam(':userid',$_SESSION['id'],PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $dbh = connectDB();
    $query = "SELECT * FROM product WHERE id = :productID ;";
    $stmt  = $dbh->prepare($query);
    $stmt->bindParam(':productID',$_GET['id'],PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    * 何かが足りない
    */
    $dbh = connectDB();
    $query = "SELECT * FROM product WHERE id = :productID ;";
    $stmt  = $dbh->prepare($query);
    $stmt->bindParam(':productID',$_POST['product_id'],PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll();

    $price = $products[0]['price'] * $_POST['num'];
    $dbh = connectDB();
    $query =
    "INSERT INTO shipping (user_id, product_id,name, num, price, addr) VALUES ( :user_id, :product_id, :name, :num, :price, :addr );";
    $stmt  = $dbh->prepare($query);
    $stmt->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->bindValue(':product_id', $_POST['product_id'], PDO::PARAM_INT);
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':num', $_POST['num'], PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':addr', $_POST['addr'], PDO::PARAM_STR);
    $stmt->execute();
}
/*ここにも欲しいな*/
require 'template_shopping.php';
?>
