<?php
$servername = "localhost";
$username = "hemaelco_erika";
$password = "eri33vgc66";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>