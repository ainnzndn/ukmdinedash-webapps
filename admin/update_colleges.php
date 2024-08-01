<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$error = '';
$success = '';

if(isset($_POST['submit'])) {
    if(empty($_POST['college_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>College Name is required!</strong>
                  </div>';
    } else {
        $college_name = mysqli_real_escape_string($db, $_POST['college_name']);

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = pathinfo($fname, PATHINFO_EXTENSION);
        $store = "../admin/college_img/" . $fname;

        if(!empty($fname)) {
            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                if($fsize < 1000000) { // 1 MB (1024 KB)
                    $ssql = "SELECT * FROM ukmdinedash_colleges WHERE college_id='$_GET[college_update]'";
                    $res = mysqli_query($db, $ssql);
                    $row = mysqli_fetch_array($res);

                    // Delete old image file if it exists
                    if(file_exists("../admin/college_img/" . $row['college_image'])) {
                        unlink("../admin/college_img/" . $row['college_image']);
                    }

                    move_uploaded_file($temp, $store);
                    $sql = "UPDATE ukmdinedash_colleges SET college_name='$college_name', college_image='$fname' WHERE college_id='$_GET[college_update]'";
                    mysqli_query($db, $sql);

                    $success = '<div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Record Updated Successfully!</strong>
                                </div>';
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Max Image Size is 1024KB!</strong> Please choose a smaller image.
                            </div>';
                }
            } else {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Invalid file extension!</strong> Only JPG, JPEG, and PNG files are allowed.
                        </div>';
            }
        } else {
            $sql = "UPDATE ukmdinedash_colleges SET college_name='$college_name' WHERE college_id='$_GET[college_update]'";
            mysqli_query($db, $sql);

            $success = '<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Record Updated Successfully!</strong>
                        </div>';
        }
    }
}

// Fetch current college data for pre-populating form fields
$ssql = "SELECT * FROM ukmdinedash_colleges WHERE college_id='$_GET[college_update]'";
$res = mysqli_query($db, $ssql);
$row = mysqli_fetch_array($res);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update College</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
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
                        <li><a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li><a href="all_users.php"><span><i class="fa fa-user f-s-20"></i></span><span>Customers</span></a></li>
                        <li><a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Stalls</span></a>
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
                            <h4 class="m-b-0 text-white">Update College</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">College Name</label>
                                                <input type="text" name="college_name" class="form-control" value="<?php echo $row['college_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">College Image</label>
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                                    <a href="add_college.php" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
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
    <script src="js/custom.min.js"></script>
</body>

</html>
