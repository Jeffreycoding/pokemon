<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Pokédex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Navigatie -->
    <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold">Pokédex</div>
            <ul class="flex space-x-6">
                <li><a href="index.php" class="text-gray-300 hover:text-white">Home</a></li>
                <li><a href="collection.php" class="text-gray-300 hover:text-white">Mijn Verzameling</a></li>
                <li><a href="rare.php" class="text-gray-300 hover:text-white">Zeldzame Pokémon</a></li>
                <li><a href="about.php" class="text-gray-300 hover:text-white">Over Ons</a></li>
                <li><a href="contact.php" class="text-gray-300 hover:text-white">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="w-full">
        <!-- Hero Section -->
        <div class="bg-blue-600 text-white py-20 px-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-5xl font-bold mb-4">Contact</h1>
                <p class="text-xl">Neem contact met ons op voor vragen of opmerkingen.</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="max-w-7xl mx-auto px-8 py-12">
            <h2 class="text-3xl font-bold mb-8">Stuur ons een bericht</h2>
            <form action="send_message.php" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Naam:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Bericht:</label>
                    <textarea id="message" name="message" class="w-full p-2 border border-gray-300 rounded-lg" rows="6" required></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Verzenden</button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">Over Ons</h4>
                    <p class="text-gray-400">Wij zijn gepassioneerde Pokémon verzamelaars die onze liefde voor deze geweldige wezens willen delen met de wereld.</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Snelle Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="collection.php" class="text-gray-400 hover:text-white">Verzameling</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white">Contact</a></li>
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