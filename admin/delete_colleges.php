
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM ukmdinedash_colleges WHERE college_id = '".$_GET['college_del']."'");
header("location:add_college.php");  

?>