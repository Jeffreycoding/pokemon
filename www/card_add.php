

<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $rarity = $_POST['rarity'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO Cards (name, type, rarity, price, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $type, $rarity, $price, $image]);

    header('Location: card_add.php');
    exit();
}

$sql = "SELECT * FROM Cards";
$stmt = $conn->query($sql);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';

require '../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Pokédex</h1>

        <form action="card_add.php" method="POST" class="mb-6">
            <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
            <label for="type" class="block text-gray-700">Type:</label>
            <input type="text" id="type" name="type" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
            <label for="rarity" class="block text-gray-700">Rarity:</label>
            <input type="text" id="rarity" name="rarity" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
            <label for="price" class="block text-gray-700">Price:</label>
            <input type="number" step="0.01" id="price" name="price" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="text" id="image" name="image" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Pokémon</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($cards as $card) : ?>
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<?php echo $card['image']; ?>.png" 
                         alt="<?php echo $card['name']; ?>" 
                         class="w-48 h-48 mx-auto object-contain">
                    <h2 class="text-xl font-bold mt-4 text-center"><?php echo $card['name']; ?></h2>
                    <p class="text-gray-600 text-center mt-2">Type: <?php echo $card['type']; ?></p>
                    <p class="text-gray-600 text-center">Rarity: <?php echo $card['rarity']; ?></p>
                    <p class="text-gray-800 text-center font-semibold mt-2">€<?php echo number_format($card['price'], 2); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
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