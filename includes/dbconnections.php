<?php
$host = "localhost";
$username = "root";
$dbpass = "";
$dbname = "contact";
global $conn;
// Create connection
$conn = mysqli_connect($host, $username, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>