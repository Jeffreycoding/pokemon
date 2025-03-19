<?php
session_start();

$id = $_GET['id'];

if (!isset($_SESSION['customer_id']) || $_SESSION['role'] !== 'Administrator') {
    echo "You do not have permission to access this page.";
    exit;
}
require 'database.php';

$sql = "SELECT * FROM cards WHERE card_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$card = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <h1>Edit Card</h1>
    <div class="container">
        <form action="collection_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $cards['card_id'] ?>">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $cards['name'] ?>">
            </div>
            <div>
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" value="<?php echo $card['type'] ?>">
            </div>
            <div>
                <label for="rarity">Rarity:</label>
                <input type="text" id="rarity" name="rarity" value="<?php echo $card['rarity'] ?>">
            </div>
            <div>   
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="<?php echo $card['price'] ?>">
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="text" id="image" name="image" value="<?php echo $card['image'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
</main>