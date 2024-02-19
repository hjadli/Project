<?php
// Database configuration
$host = 'localhost'; // Assuming your database server is on the same host
$username = 'root'; // Default username for XAMPP MySQL
$password = ''; // Default password for XAMPP MySQL
$database = 'Cryptoshow'; // Change this to your database name

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
