<?php
session_start();

//if (!isset($_SESSION['user_id'])) {
  //  echo "You are not logged in, please login. ";
    //echo "<a href='login.php'>Login here</a>";
    //exit;
//}

//if ($_SESSION['role'] != 'administrator') {
   // echo "You are not allowed to view this page, please login as admin";
    //exit;
//}
require 'database.php';

require 'header.php';

$sql = "SELECT * FROM cards";
$stmt = $conn->prepare($sql);
$stmt->execute();
$card_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verzameling - Pokédex</title>    
    <script src="https://cdn.tailwindcss.com"></script>
    <img src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/<?php echo str_pad($card['picture'], 3, '0', STR_PAD_LEFT); ?>.png" alt="<?php echo $card['name']?>" class="w-full h-64 object-cover">

</head>
<body>
<main>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Zeldzaamheid</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($card_id as $card) : ?>
                <tr>
                    <td><?php echo $card['name'] ?></td>
                    <td><?php echo $card['type'] ?></td>
                    <td><?php echo $card['rarity'] ?></td>
                    <td><?php echo $card['price'] ?></td>
                    <td>

                
                         <a href="collection_edit.php?id=<?php echo $card['card_id'] ?>">Wijzig</a>
                        <a href="collection_delete.php?id=<?php echo $card['card_id'] ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>