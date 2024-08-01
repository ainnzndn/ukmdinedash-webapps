<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit'])) {
    if(empty($_POST['college_name']) || empty($_POST['stall_name']) || empty($_POST['seller_name']) || empty($_POST['seller_password']) || $_POST['email']=='' || $_POST['phone']=='' || $_POST['o_hr']=='' || $_POST['c_hr']=='' || $_POST['o_days']=='' || $_POST['address']=='') {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>All fields must be filled!</strong>
                    </div>';
    
    } else {
        $college_id = $_POST['college_name'];
        $stall_name = $_POST['stall_name'];
        $seller_name = $_POST['seller_name'];
        $seller_password = $_POST['seller_password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $o_hr = $_POST['o_hr'];
        $c_hr = $_POST['c_hr'];
        $o_days = $_POST['o_days'];
        $address = $_POST['address'];

        if(!empty($_FILES['file']['name'])) {                   
            
            $fname = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $fsize = $_FILES['file']['size'];
            $extension = pathinfo($fname, PATHINFO_EXTENSION);
            $store = "../images/stall_img/" . basename($fname);

            $allowed_extensions = array('jpg', 'png', 'jpeg');

            if(in_array($extension, $allowed_extensions)) {
                if($fsize >= 1000000) {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Max Image Size is 1024KB!</strong> Try a different image.
                                </div>';
                } else {
                    move_uploaded_file($temp, $store);
                }
            } else {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Invalid image extension!</strong> Only JPG, PNG, GIF are accepted.
                            </div>';
            }
        }

        $mql = "UPDATE ukmdinedash_stalls s 
                INNER JOIN ukmdinedash_colleges c ON s.college_id = c.college_id 
                SET s.college_id='$college_id', s.stall_name='$stall_name', s.seller_name='$seller_name', s.seller_password='$seller_password', s.email='$email', s.phone='$phone', s.o_hr='$o_hr', s.c_hr='$c_hr', s.o_days='$o_days', s.address='$address'";
        
        if(isset($fname)) {
            $mql .= ", s.image='$fname'";
        }

        $mql .= " WHERE s.stall_id='$_GET[stall_update]'";

        if(mysqli_query($db, $mql)) {
            $success = '<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Updated</strong> Successfully!
                        </div>';
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error:</strong> ' . mysqli_error($db) . '
                        </div>';
        }
    }
}

if(isset($_GET['stall_update'])) {
    $ssql ="SELECT s.*, c.college_name 
            FROM ukmdinedash_stalls s 
            INNER JOIN ukmdinedash_colleges c ON s.college_id = c.college_id 
            WHERE s.stall_id='$_GET[stall_update]'";
    $res = mysqli_query($db, $ssql); 
    $row = mysqli_fetch_array($res);
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
    <title>Update Stall</title>
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
                        <hr>
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"><span><i class="fa fa-user f-s-20"></i></span><span>Customers</span></a></li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Stalls</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_stalls.php">All Stalls</a></li>
                                <li><a href="add_college.php">Add New College</a></li>
                                <li><a href="add_stall.php">Add New Stall</a></li>
                            </ul>
                        </li>
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
                            <h4 class="m-b-0 text-white">Update Stall</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Stall Name</label>
                                                <input type="text" name="stall_name" class="form-control" value="<?php echo $row['stall_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Seller Name</label>
                                                <input type="text" name="seller_name" class="form-control" value="<?php echo $row['seller_name']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="text" name="seller_password" class="form-control" value="<?php echo $row['seller_password']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Opening Hours</label>
                                                <input type="text" name="o_hr" class="form-control" value="<?php echo $row['o_hr']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Closing Hours</label>
                                                <input type="text" name="c_hr" class="form-control" value="<?php echo $row['c_hr']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Opening Days</label>
                                                <input type="text" name="o_days" class="form-control" value="<?php echo $row['o_days']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <textarea class="form-control" name="address" rows="3" required><?php echo $row['address']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Select College</label>
                                                <select name="college_name" class="form-control custom-select" data-placeholder="Choose a College" tabindex="1">
                                                    <option value="<?php echo $row['college_id']; ?>"><?php echo $row['college_name']; ?></option>
                                                    <?php 
                                                    $ssql_colleges ="SELECT * FROM ukmdinedash_colleges";
                                                    $res_colleges = mysqli_query($db, $ssql_colleges); 
                                                    while($row_college = mysqli_fetch_array($res_colleges)) { 
                                                        if ($row_college['college_id'] != $row['college_id']) {
                                                            echo '<option value="'.$row_college['college_id'].'">'.$row_college['college_name'].'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Stall Image</label>
                                                <input type="file" name="file" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                    <a href="all_stalls.php" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-init.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
