<?php
require 'database.php';
require 'header.php';

if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $emailForm = $_POST['email'];
        $passwordForm = $_POST['password'];

        try {
            $sql = "SELECT * FROM customers WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $emailForm, PDO::PARAM_STR);
            $stmt->execute();
            $customer = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($customer && password_verify($passwordForm, $customer['password'])) {
                session_start();
                $_SESSION['customer_id']    = $customer['customer_id'];
                $_SESSION['name']      = $customer['name'];
                $_SESSION['email']  = $customer['email'];
                $_SESSION['adress']       = $customer['adress'];
                $_SESSION['created_at']       = $customer['created_at'];
                $_SESSION['role']       = $customer['role'] ?? 'customer';

                header("Location: /pokemon/www/user_dash.php");
                exit;
            } else {
                $_SESSION['message'] = 'wrongpassword';
            }
            // Set a cookie to keep the user logged in
        } catch (PDOException $e) {
            $_SESSION['message'] = 'dberror';
        }
    } else {
        $_SESSION['message'] = 'emptyfields';
    }
} else {
    $_SESSION['message'] = 'notsubmitted';
}

require 'login_message.php';
?>
