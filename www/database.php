<?php

//database connection   
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pokemon";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
