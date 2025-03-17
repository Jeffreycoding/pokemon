<?php
session_start();
include 'database.php';

$sql = "SELECT * FROM Cards";
$stmt = $conn->query($sql);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);



require '../vendor/autoload.php';

use Carbon\Carbon;

// printf("Now: %s", Carbon::now());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
</head>

<body class="bg-gray-100">
    <?php require 'header.php'; ?>
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Pokédex</h1>
        
        <div class="text-center mb-6">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search for a Pokémon..." class="px-4 py-2 border rounded-lg">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
            </form>
        </div>
        
        <p class="text-center text-gray-600">Use the search bar above to find your favorite Pokémon cards.</p>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-10">
        <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h4 class="text-xl font-bold mb-4">Over Ons</h4>
                <p class="text-gray-400">Wij zijn gepassioneerde Pokémon verzamelaars die onze liefde voor deze geweldige wezens willen delen met de wereld.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-4">Snelle Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Verzameling</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-4">Contact</h4>
                <p class="text-gray-400">Email: info@pokemon-verzameling.nl</p>
                <p class="text-gray-400">Tel: +31 (0)6 12345678</p>
                <p class="text-gray-400">Locatie: Amsterdam, Nederland</p>
            </div>
        </div>
    </footer>
</body>

</html>
