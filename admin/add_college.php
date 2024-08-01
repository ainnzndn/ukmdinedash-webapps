<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['college_name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>College Name is required!</strong>
                  </div>';
    } else {
        $college_name = mysqli_real_escape_string($db, $_POST['college_name']);

        // Check if the college name already exists
        $check_college = mysqli_query($db, "SELECT college_name FROM ukmdinedash_colleges WHERE college_name = '$college_name'");
        if (mysqli_num_rows($check_college) > 0) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>College already exists!</strong>
                      </div>';
        } else {
            $fname = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $fsize = $_FILES['file']['size'];
            $extension = pathinfo($fname, PATHINFO_EXTENSION);

            if (!empty($fname)) {
                // Validate file extension
                if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                    // Validate file size
                    if ($fsize < 1000000) { // 1 MB (1024 KB)
                        // Move uploaded file to destination directory
                        $store = "../admin/college_img/" . $fname;
                        if (move_uploaded_file($temp, $store)) {
                            // Insert new college record into database
                            $mql = "INSERT INTO ukmdinedash_colleges (college_name, college_image) VALUES ('$college_name', '$fname')";
                            if (mysqli_query($db, $mql)) {
                                $success = '<div class="alert alert-success alert-dismissible fade show">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              New College Added Successfully.
                                            </div>';
                            } else {
                                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Error adding college: ' . mysqli_error($db) . '</strong>
                                          </div>';
                            }
                        } else {
                            $error = '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Error uploading image!</strong> Please try again.
                                      </div>';
                        }
                    } else {
                        $error = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Max Image Size is 1024KB!</strong> Please choose a smaller image.
                                  </div>';
                    }
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Invalid file extension!</strong> Only JPG, JPEG, PNG, and GIF files are allowed.
                              </div>';
                }
            } else {
                // If no image is uploaded, insert the college without an image
                $mql = "INSERT INTO ukmdinedash_colleges (college_name) VALUES ('$college_name')";
                if (mysqli_query($db, $mql)) {
                    $success = '<div class="alert alert-success alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  New College Added Successfully.
                                </div>';
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Error adding college: ' . mysqli_error($db) . '</strong>
                              </div>';
                }
            }
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add College</title>
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
                            <h4 class="m-b-0 text-white">Add New College</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">College Name</label>
                                                <input type="text" name="college_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">College Image</label>
                                                <input type="file" name="file" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Add College">
                                        <a href="add_college.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="card-body">
                            <br>
                            <h4 class="card-title">Listed Colleges</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>College Name</th>
                                            <th>Date</th>
                                            <th>College Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM ukmdinedash_colleges ORDER BY college_id DESC";
                                        $query = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($rows = mysqli_fetch_assoc($query)) {
                                                echo '<tr>
                                                        <td>' . $rows['college_id'] . '</td>
                                                        <td>' . $rows['college_name'] . '</td>
                                                        <td>' . $rows['date'] . '</td>
                                                        <td>
                                                            <img src="../admin/college_img/' . $rows['college_image'] . '" class="img-responsive radius" style="max-height:150px;max-width:150px;" />
                                                        </td>
                                                        <td>
                                                            <a href="delete_colleges.php?college_del=' . $rows['college_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                            <a href="update_colleges.php?college_update=' . $rows['college_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="5"><center>No Colleges Data!</center></td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
    <script src="js/custom.min.js"></script>
</body>
</html>
