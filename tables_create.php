<?php
require_once 'conn.php';

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table users created successfully <br>";
} else {
    echo "Error creating users table: " . mysqli_error($conn);
}

// Create todos table
$sql = "CREATE TABLE IF NOT EXISTS `todos` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `todo` varchar(255) NOT NULL,
    `user_id` int(11) NOT NULL
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table todos created successfully";
} else {
    echo "Error creating todos table: " . mysqli_error($conn);
}
?>
