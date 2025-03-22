<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_form"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
