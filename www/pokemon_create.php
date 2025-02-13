<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pokemon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create a New Pokemon</h1>
    <form action="pokemon_store.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br>

        <label for="level">Level:</label>
        <input type="number" id="level" name="level" min="1" max="100" required><br>

        <input type="submit" value="Create Pokemon">
    </form>
</body>
</html>
<?php
// Include the autoloader provided in the SDK
include 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $type = $_POST['type'];
    $level = $_POST['level'];

    // Insert data into database
    $sql = "INSERT INTO pokemon (name, type, level) VALUES ('$name', '$type', '$level')";
    if (mysqli_query($conn, $sql)) {
        echo "New Pokemon created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>