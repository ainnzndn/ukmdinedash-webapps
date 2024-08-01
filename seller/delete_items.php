<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM ukmdinedash_items WHERE itm_id = '".$_GET['item_del']."'");
header("location:all_items.php");  

?>