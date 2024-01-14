<?php
$servername = "localhost";
$username = "u617415064_bepta";
$password = "Bepta@12345";
$dbname = "u617415064_bepta";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>