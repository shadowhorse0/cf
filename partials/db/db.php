<?php
$servername = "localhost";
$username = "cf";
$password = "cf@12345";


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
