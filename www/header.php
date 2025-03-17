<script src="https://cdn.tailwindcss.com"></script>
<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-white text-2xl font-bold">Pokédex</div>
        <ul class="flex space-x-6 items-center">
            <div class="relative" id="menu-container">
                <button class="text-gray-300 hover:text-white" id="menu-button">
                    Menu ↓
                </button>
                <ul id="dropdown-menu" class="absolute left-[-10px] bg-gray-800 text-white shadow-lg mt-1 rounded-md w-48 
                    opacity-0 scale-95 transform transition-all duration-300 origin-top hidden"> 
                    <li><a href="index.php" class="block px-4 py-2 text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="collection.php" class="block px-4 py-2 text-gray-300 hover:text-white">Mijn Verzameling</a></li>
                    <li><a href="search.php" class="block px-4 py-2 text-gray-300 hover:text-white">zoeken</a></li>
                    <li><a href="card_add.php" class="block px-4 py-2 text-gray-300 hover:text-white">Pokemon toevoegen</a></li>
                </ul>
            </div>

            <?php if (isset($_SESSION['customer_id'])) : ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                    <li><a href="pokemon_create.php" class="text-gray-300 hover:text-white">Kaart toevoegen</a></li>
                    <li><a href="collection.php" class="text-gray-300 hover:text-white">Kaart index</a></li>
                    <li><a href="dashboard.php" class="text-gray-300 hover:text-white">Dashboard</a></li>
                    <li><a href="user_create.php" class="text-gray-300 hover:text-white">Gebruiker toevoegen</a></li>
                    <li><a href="user_index.php" class="text-gray-300 hover:text-white">Gebruiker overzicht</a></li>
                <?php endif; ?>
                <li><a href="logout.php" class="text-gray-300 hover:text-white">Logout</a></li>
            <?php else : ?>
                <li><a href="login.php" class="text-gray-300 hover:text-white">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuButton = document.getElementById("menu-button");
        const dropdownMenu = document.getElementById("dropdown-menu");

        menuButton.addEventListener("click", function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle("hidden");
            dropdownMenu.classList.toggle("opacity-0");
            dropdownMenu.classList.toggle("scale-95");
        });

        document.addEventListener("click", function (event) {
            if (!dropdownMenu.contains(event.target) && !menuButton.contains(event.target)) {
                dropdownMenu.classList.add("hidden", "opacity-0", "scale-95");
            }
        });
    });
</script>