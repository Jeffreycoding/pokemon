<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
    
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <?php

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    echo "You are not allowed to view this page";
    exit;
}
        session_start();
        require 'database.php';

        if (!isset($_SESSION['customer_id'])) {
            echo "<div class='text-red-500 font-bold'>U bent niet ingelogd. <a href='login.php' class='text-blue-500'>Login hier</a></div>";
            exit;
        }

        $query = "SELECT * FROM customers WHERE customer_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            [
                'id' => $_SESSION['customer_id']
            ]
        );
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$customer) {
            echo "<div class='text-red-500 font-bold'>Gebruiker niet gevonden.</div>";
            exit;
        }

        // var_dump($customers[4]);
        // die
        ?>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Welkom, <?php echo htmlspecialchars($customer['name']); ?>!</h1>
            <p class="text-gray-700"><strong>Email:</strong> <?php echo htmlspecialchars($customer['email']); ?></p>
            <p class="text-gray-700"><strong>Adres:</strong> <?php echo htmlspecialchars($customer['address']); ?></p>
            <p class="text-gray-700"><strong>Rol:</strong> <?php echo htmlspecialchars($customer['role']); ?></p>
            
            <div class="mt-4">
                <a href="customer_edit.phpid=<?php echo $customer['customer_id']; ?>" class="text-blue-500">Wijzig </a> |
                <a href="customer_delete.phpid=<?php echo $customer['customer_id']; ?>" class="text-blue-500">Verwijderen</a> |
                <a href="logout.php" class="text-red-500">Uitloggen</a>
            </div>
        </div>
    </div>
</body>
</html>
