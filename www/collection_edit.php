<?php
session_start();

$id = $_GET['id'];

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'administrator') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

require 'database.php';

$sql = "SELECT * FROM cards WHERE card_id = $id";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<main>
    <h1>Edit Card</h1>
    <div class="container">
        <form action="tools_edit_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $card['card_id'] ?>">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $card['name'] ?>">
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
<?php require 'footer.php' ?>
