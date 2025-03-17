<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id'])) {
    echo "Invalid request";
    exit;
}

$id = $_GET['id'];
require 'database.php';

$sql = "SELECT * FROM cards WHERE card_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$card = $stmt->fetch();

if (!$card) {
    echo "Card not found";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card Detail - Pokédex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php require 'header.php'; ?>
    <main>
        <?php if ($card): ?>
            <div class="card-detail">
                <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<?php echo htmlspecialchars($card['image']); ?>.png" alt="<?php echo htmlspecialchars($card['name']); ?>">
                <h1><?php echo htmlspecialchars($card['name']); ?></h1>
                <p>Type: <?php echo htmlspecialchars($card['type']); ?></p>
                <p>Rarity: <?php echo htmlspecialchars($card['rarity']); ?></p>
                <p>Price: <?php echo htmlspecialchars($card['price']); ?></p>
                <a href="collection_edit.php?id=<?php echo htmlspecialchars($card['card_id']); ?>">Edit</a>
                <a href="collection_delete.php?id=<?php echo htmlspecialchars($card['card_id']); ?>">Delete</a>
            </div>
        <?php else: ?>
            <p>Card not found.</p>
        <?php endif; ?>
    </main>
</body>
</html>