<?php
require 'database.php';
require 'header.php';


if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            $sql = "SELECT * FROM customers WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $emailForm);
            $stmt->execute();
            $result = $stmt->get_result();
            $customer_id = $result->fetch_assoc();

            if ($customer_id && password_verify($passwordForm, $customer_id['password'])) {
                session_start();
                $_SESSION['user_id']    = $customer_id['id'];
                $_SESSION['email']      = $customer_id['email'];
                $_SESSION['firstname']  = $customer_id['firstname'];
                $_SESSION['lastname']   = $customer_id['lastname'];
                $_SESSION['role']       = $customer_id['role'];

                header("Location: index.php");
                exit;
            } else {
                $_GET['message'] = 'wrongpassword';
            }
        } else {
            $_GET['message'] = 'emptyfields';
        }
    } else {
        $_GET['message'] = 'usernotfound';
    }
} else {
    $_GET['message'] = 'notsubmitted';
}

require 'login_message.php';

?>
<main>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h1>Login</h1>
    <div class="container">

        <form action="login.php" method="post">
            <div class="form-group">

                <label for="email">Email</label>
                <input type="text" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" placeholder="password">
            </div>
            <button name="submit" class="btn btn-success">Inloggen</button>
        </form>
    </div>
</main> 
</body>
</html>

