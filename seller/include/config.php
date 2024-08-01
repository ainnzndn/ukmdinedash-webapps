<?php

define('DB_HOST','lrgs.ftsm.ukm.my');
define('DB_USER','a188203');
define('DB_PASS','littlegraycat');
define('DB_NAME','a188203');

$conn = mysqli_connect('lrgs.ftsm.ukm.my','a188203','littlegraycat','a188203') or die(mysqli_error());

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>
