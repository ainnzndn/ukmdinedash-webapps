<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'])) {
    if(empty($_POST['uname']) ||
       empty($_POST['matricnum']) ||
       empty($_POST['fname']) ||
       empty($_POST['lname']) ||
       empty($_POST['email']) ||
       empty($_POST['password']) ||
       empty($_POST['phone'])) {
        
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>All fields required!</strong>
                  </div>';
    } else {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !preg_match('/@(ukm.edu.my|siswa.ukm.edu.my)$/', $_POST['email'])) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Invalid email format or domain!</strong>
                      </div>';
        } elseif(strlen($_POST['password']) < 6) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Password must be >=6!</strong>
                      </div>';
        } elseif(strlen($_POST['phone']) < 10) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Invalid phone!</strong>
                      </div>';
        } else {
            $mql = "UPDATE ukmdinedash_users 
                    SET username='$_POST[uname]', 
                        matric_num='$_POST[matricnum]', 
                        f_name='$_POST[fname]', 
                        l_name='$_POST[lname]',
                        email='$_POST[email]',
                        phone='$_POST[phone]',
                        password='".md5($_POST['password'])."' 
                    WHERE u_id='$_GET[user_update]'";
                    
            mysqli_query($db, $mql);
            $success = '<div class="alert alert-success alert-dismissible fade show">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Customer Updated!</strong>
                        </div>';
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Users</title>
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
                <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="images/manager.png" alt="user" class="profile-pic" style="width: 18%; float: right;" />
                            </a>
                </div>
                <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0"></ul>
                <ul class="navbar-nav ml-auto my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/manager.png" alt="user" class="profile-pic" style="width: 4%; float: right;" />
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
                        <li>
                            <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_items.php">All Items</a></li>
                                <li><a href="add_item.php">Add New Item</a></li>
                            </ul>
                        </li>
                        <li><a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <?php  
                        echo $error;
                        echo $success; 
                        ?>

                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Update Customer</h4>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    $ssql ="SELECT * FROM ukmdinedash_users WHERE u_id='$_GET[user_update]'";
                                    $res = mysqli_query($db, $ssql); 
                                    $newrow = mysqli_fetch_array($res);
                                    ?>
                                    <form action='' method='post'>
                                        <div class="form-body">
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" name="uname" class="form-control" value="<?php echo $newrow['username']; ?>" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">Matric Number</label>
                                                        <input type="text" name="matricnum" class="form-control form-control-danger" value="<?php echo $newrow['matric_num']; ?>" placeholder="A188203">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="fname" class="form-control form-control-danger" value="<?php echo $newrow['f_name']; ?>" placeholder="Jon">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="lname" class="form-control" value="<?php echo $newrow['l_name']; ?>" placeholder="Doe">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" name="email" class="form-control form-control-danger" value="<?php echo $newrow['email']; ?>" placeholder="example@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone Number</label>
                                                        <input type="text" name="phone" class="form-control form-control-danger" value="<?php echo $newrow['phone']; ?>" placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                        <a href="all_users.php" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "include/footer.php" ?>
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
