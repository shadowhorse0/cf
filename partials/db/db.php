<?php
$servername = "localhost";
$username = "vaibhav";
$password = "Balveer@12345";


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
