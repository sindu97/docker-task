<?php
$servername = "mysql";
$username = "root";
$password = "sr263804R!";
$dbName = "taskmanager";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
