<?php

/* Maak de connection string voor MySQL */

$host = 'localhost';

$dbname = 'Social_Site';

$username = 'root';

$password = '';


$conn = new mysqli($host, $username, $password);

$sqlDB = "CREATE DATABASE IF NOT EXISTS Social_Site";

if ($conn->query($sqlDB) === TRUE) {
    echo "";
} else {
    echo "Error creating database: ";
}

$conn->close();

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

