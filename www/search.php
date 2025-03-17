<?php
session_start();
include 'database.php';

$query = $_GET['query'] ?? '';
$sql = "SELECT * FROM Cards WHERE name LIKE :query";
$stmt = $conn->prepare($sql);
$stmt->execute(['query' => '%' . $query . '%']);
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
    <title>Search Results</title>
</head>

<body class="bg-gray-100">
    <?php require 'header.php'; ?>
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Search Results</h1>
        
        <div class="text-center mb-6">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search for a Pokémon..." class="px-4 py-2 border rounded-lg" value="<?php echo htmlspecialchars($query); ?>">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
            </form>
        </div>
        
        <?php if ($cards): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($cards as $card) : ?>
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <a href="card_detail.php?id=<?php echo $card['id']; ?>">
                            <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<?php echo $card['image']; ?>.png" 
                                 alt="<?php echo $card['name']; ?>" 
                                 class="w-48 h-48 mx-auto object-contain">
                        </a>
                        <h2 class="text-xl font-bold mt-4 text-center"><?php echo $card['name']; ?></h2>
                        <p class="text-gray-600 text-center mt-2">Type: <?php echo $card['type']; ?></p>
                        <p class="text-gray-600 text-center">Rarity: <?php echo $card['rarity']; ?></p>
                        <p class="text-gray-800 text-center font-semibold mt-2">€<?php echo number_format($card['price'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600">No results found for "<?php echo htmlspecialchars($query); ?>"</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-10">
        <!-- ...existing code... -->
    </footer>
</body>

</html>
