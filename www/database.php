<?php

//database connection   
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pokemon";


try {
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
}
catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}