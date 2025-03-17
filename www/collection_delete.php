<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    echo "You are not allowed to view this page";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require 'database.php';
    $sql = "DELETE FROM cards WHERE card_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

header("Location: tools_index.php");
exit;
?>