<?php
session_start();

if (!isset($_SESSION['customer_id']) || $_SESSION['role'] !== 'Administrator') {
    echo "You do not have permission to access this page.";
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