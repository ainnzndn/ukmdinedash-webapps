
<?php
include("../connection/connect.php"); 
error_reporting(E_ALL);
session_start();

$error = '';
$success = '';

if(isset($_POST['submit'])) {
    if(empty($_POST['item_name']) || empty($_POST['price']) || empty($_POST['stall_name']) || empty($_POST['college_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>All fields must be filled!</strong>
                    </div>';
    } else {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = pathinfo($fname, PATHINFO_EXTENSION);
        $store = "../images/stall_img/" . basename($fname); 

        $allowed_extensions = array('jpg', 'jpeg', 'png');
        if(!in_array($extension, $allowed_extensions)) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Invalid extension!</strong> Only JPG, JPEG, PNG files are accepted.
                        </div>';
        } elseif($fsize >= 1000000) { 
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Max Image size is 1024KB!</strong> Try with a smaller size image.
                        </div>';
        } elseif (!move_uploaded_file($temp, $store)) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error uploading file!</strong> Please try again later.
                        </div>';
        } else {
            $stall_id = $_POST['stall_name'];
            $itm_id = 0;

            $sql_get_max_itm_id = "SELECT MAX(SUBSTRING(itm_id, 1, 2)) AS max_itm_id FROM ukmdinedash_items WHERE stall_id = $stall_id";
            $result = mysqli_query($db, $sql_get_max_itm_id);
            $row = mysqli_fetch_assoc($result);
            $max_itm_id = $row['max_itm_id'];
            $itm_id_suffix = ($max_itm_id !== null) ? $max_itm_id + 1 : 1;

            $itm_id = sprintf('%02d', $itm_id_suffix) . $stall_id;

            $college_id = $_POST['college_name'];

            $sql = "INSERT INTO ukmdinedash_items (itm_id, stall_id, college_id, title, price, img) 
                    VALUES ('$itm_id', $stall_id, $college_id, '".$_POST['item_name']."', '".$_POST['price']."', '".$fname."')";
            
            if(mysqli_query($db, $sql)) {
                $success = '<div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                New Item Added Successfully.
                            </div>';
            } else {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Error adding item: ' . mysqli_error($db) . '
                            </div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add New Item</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>

<div id="main-wrapper">
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light" style="background-color: #FFEBC4;">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php" style="background-color: #FFEBC4;">
                    <span><img src="images/logo.png" alt="homepage" class="dark-logo" style="width: 70%;" /></span>
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0"></ul>
                <ul class="navbar-nav ml-auto my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" style="width: 4%; float: right;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-md animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label">Home</li>
                    <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                    <li class="nav-label">Log</li>
                    <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Customers</span></a></li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Stalls</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="all_stalls.php">All Stalls</a></li>
                            <li><a href="add_college.php">Add New College</a></li>
                            <li><a href="add_stall.php">Add New Stall</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Items</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="all_items.php">All Items</a></li>
                            <li><a href="add_item.php">Add New Item</a></li>
                        </ul>
                    </li>
                    <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="page-wrapper">

    <div class="container-fluid">
        <?php echo $error; ?>
        <?php echo $success; ?>
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add New Item</h4>
                </div>
                <div class="card-body">
                    <form action='' method='post' enctype="multipart/form-data">
                        <div class="form-body">
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Item Name</label>
                                        <input type="text" name="item_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Item Price (RM)</label>
                                        <input type="text" name="price" class="form-control" placeholder="RM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Item Image</label>
                                        <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select Stall</label>
                                        <select name="stall_name" class="form-control custom-select" data-placeholder="Choose a Stall" tabindex="1">
                                            <option value="">--Select Stall--</option>
                                            <?php
                                            $ssql = "SELECT * FROM ukmdinedash_stalls";
                                            $res = mysqli_query($db, $ssql);
                                            while($row = mysqli_fetch_array($res)) {
                                                echo '<option value="'.$row['stall_id'].'">'.$row['stall_name'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Select College</label>
                                        <select name="college_name" class="form-control custom-select" data-placeholder="Choose a College" tabindex="1">
                                            <option value="">--Select College--</option>
                                            <?php
                                            $ssql = "SELECT * FROM ukmdinedash_colleges";
                                            $res = mysqli_query($db, $ssql);
                                            while($row = mysqli_fetch_array($res)) {
                                                echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Add Item">
                            <a href="add_menu.php" class="btn btn-inverse">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </div>
</div>

<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="js/custom.min.js"></script>

</body>
</html>
