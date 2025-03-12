<?php

require 'database.php';

$cards = [];

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    if (strlen($search) >= 3) {
        try {
            $sql = "SELECT * FROM Cards WHERE name LIKE :search";

            $stmt = $conn->prepare($sql);
            $searchWildcard = '%' . $search . '%';
            $stmt->bindParam(':search', $searchWildcard);

            $stmt->execute();

            $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$cards) {
                echo "<p>Geen kaarten gevonden voor zoekterm: " . htmlspecialchars($search) . ".</p>";
            }
        } catch (PDOException $e) {
            echo "Fout bij het uitvoeren van de zoekopdracht: " . $e->getMessage();
        }
    } else {
        echo "<p>Voer minimaal 3 letters in.</p>";
    }
} else {
    echo "<p>Zoekveld is leeg, vul een zoekopdracht in.</p>";
}

require 'header.php';
?>

<script src="https://cdn.tailwindcss.com"></script>
<div class="container">
    <form action="" method="get">
        <input type="text" name="search" id="search" placeholder="Zoek naar een kaart">
        <button type="submit" name="search_submit">Zoek</button>
    </form>
</div>

<div class="container">
    <h1>Resultaten</h1>
    <?php if (!empty($cards)) : ?>
        <ul>
            <?php foreach ($cards as $card) : ?>
                <li>
                    <strong>Naam:</strong> <?= htmlspecialchars($card['name']); ?><br>
                    <strong>Type:</strong> <?= htmlspecialchars($card['type']); ?><br>
                    <strong>Price in €</strong> <?= htmlspecialchars($card['price']); ?><br>
                    <strong>Image:</strong> <?= htmlspecialchars($card['image']); ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Geen resultaten gevonden.</p>
    <?php endif; ?>
</div>
