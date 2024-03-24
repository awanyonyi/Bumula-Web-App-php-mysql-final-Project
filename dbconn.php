<?php
$host = "localhost";
$username = "root";
$password = "Allanware5895";
$db_name = "william";

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log the error message
    error_log("Connection failed: " . $e->getMessage());
    die("Connection failed. Please check the logs for details.");
}
