<?php
require 'database.php';
require 'header.php';
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

        <form action="login_process.php" method="post">
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

