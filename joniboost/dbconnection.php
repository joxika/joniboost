<?php
$database_servername = "127.0.0.1";
$database_username = "root";
$database_password = "";
$database_name = "joniboost";

// Create connection
$conn = new mysqli($database_servername, $database_username, $database_password, $database_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>