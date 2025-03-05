<?php
session_start();
include 'database.php';
$sql = "SELECT * FROM Cards";
$stmt = $conn->query($sql);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);
require 'header.php';

require '../vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<?php foreach ($cards as $card) : ?>
                <tr>
                    <td><?php echo $card['name'] ?></td>
                    <td><?php echo $card['type'] ?></td>
                    <td><?php echo $card['rarity'] ?></td>
                    <td><?php echo $card['price'] ?></td>
                    <td><?php echo $card['image'] ?></td>

                
                         <a href="collection_edit.php?id=<?php echo $card['card_id'] ?>">Wijzig</a>
                        <a href="collection_delete.php?id=<?php echo $card['card_id'] ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">Over Ons</h4>
                    <p class="text-gray-400">Wij zijn gepassioneerde Pokémon verzamelaars die onze liefde voor deze
                        geweldige wezens willen delen met de wereld.</p>
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
    </div>
</body>

</html>