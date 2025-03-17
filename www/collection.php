<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM Cards";
$stmt = $conn->query($sql);
$card_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verzameling - Pokédex</title>    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php require 'header.php'; ?>
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Pokédex</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($card_id as $card) : ?>
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<?php echo $card['image']; ?>.png" 
                         alt="<?php echo $card['name']; ?>" 
                         class="w-48 h-48 mx-auto object-contain">
                    <h2 class="text-xl font-bold mt-4 text-center"><?php echo $card['name']; ?></h2>
                    <p class="text-gray-600 text-center mt-2">Type: <?php echo $card['type']; ?></p>
                    <p class="text-gray-600 text-center">Rarity: <?php echo $card['rarity']; ?></p>
                    <p class="text-gray-800 text-center font-semibold mt-2">€<?php echo number_format($card['price'], 2); ?></p>
                    <div class="text-center mt-4">
                        <a href="collection_edit.php?id=<?php echo $card['card_id'] ?>" class="text-blue-500 hover:underline">Wijzig</a>
                        <a href="collection_delete.php?id=<?php echo $card['card_id'] ?>" class="text-red-500 hover:underline ml-4">Verwijder</a>
                    </div>
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
        </tbody>
    </table>
</main>
</body>
</html>