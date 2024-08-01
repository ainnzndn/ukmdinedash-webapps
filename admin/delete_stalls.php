
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM ukmdinedash_stalls WHERE stall_id = '".$_GET['stall_del']."'");
header("location:all_stalls.php");  

?>