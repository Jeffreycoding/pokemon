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
            $stmt->bindValue(1, $emailForm, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->execute();
            $customer_id = $stmt->fetch(PDO::FETCH_ASSOC);

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
                $_POST['message'] = 'wrongpassword';
            }
        } else {
            $_GET['message'] = 'emptyfields';
            $_POST['message'] = 'emptyfields';
        }
    } else {
        $_GET['message'] = 'usernotfound';
        $_POST['message'] = 'usernotfound';
    }
} else {
    $_GET['message'] = 'notsubmitted';
    $_POST['message'] = 'notsubmitted';
}
header("Location: index.php");
exit;

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

