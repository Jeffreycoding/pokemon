<?php
session_start();


if (!isset($_SESSION['customer_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}




require 'database.php';

$query = "SELECT * FROM customers";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>
<main>
    <div class="container">


        <table>
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['name'] ?></td>
                        <td><?php echo $customer['email'] ?></td>
                        <td><?php echo $customer['adress'] ?></td>
                        <td><?php echo $customer['role'] ?></td>    
                        <td>
                            <a href="users_detail.php?id=<?php echo $user['id'] ?>">Bekijk</a>
                            <a href="users_edit.php?id=<?php echo $user['id'] ?>">Wijzig</a>
                            <a href="users_delete.php?id=<?php echo $user['id'] ?>">Verwijder</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>