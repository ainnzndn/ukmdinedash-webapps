<?php
// Database configuration
$servername = "lrgs.ftsm.ukm.my"; // Server name or IP address
$username = "a188203"; // MySQL username
$password = "littlegraycat"; // MySQL password
$dbname = "a188203"; // Database name

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$db) {
    // If connection fails, handle the error
    die("Connection failed: " . mysqli_connect_error());
}

// Optionally, set character set to utf8 (if needed)
mysqli_set_charset($db, "utf8");

// Optionally, enable persistent connections
// $db = mysqli_pconnect($servername, $username, $password);

// Now $db can be used to perform database operations throughout your application
?>
