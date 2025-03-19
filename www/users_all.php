<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gebruikerslijst</title>
</head>
<body class="bg-gray-100 text-gray-900">

<?php
session_start();

if (!isset($_SESSION['customer_id']) || $_SESSION['role'] !== 'Administrator') {
    echo "<div class='flex justify-center items-center h-screen text-center'>";
    echo "<div class='bg-white p-6 rounded-lg shadow-md'>";
    echo "<p class='text-lg font-semibold'>Je hebt geen toestemming om deze pagina te bekijken.</p>";
    echo "</div></div>";
    exit;
}

require 'database.php';

$query = "SELECT * FROM customers";
$stmt = $conn->prepare($query);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main class="container mx-auto py-10">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Gebruikerslijst</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Naam</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Adres</th>
                    <th class="border border-gray-300 px-4 py-2">Rol</th>
                    <th class="border border-gray-300 px-4 py-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($customer['name']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($customer['email']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($customer['address']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($customer['role']); ?></td>
                        <td class="border border-gray-300 px-4 py-2 space-x-2">
                            <a href="users_detail.php?id=<?php echo $customer['id']; ?>" class="text-blue-500 hover:underline">Bekijk</a>
                            <a href="users_edit.php?id=<?php echo $customer['id']; ?>" class="text-yellow-500 hover:underline">Wijzig</a>
                            <a href="users_delete.php?id=<?php echo $customer['id']; ?>" class="text-red-500 hover:underline">Verwijder</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>