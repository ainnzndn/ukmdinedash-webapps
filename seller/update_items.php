<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
    if(empty($_POST['item_name']) || $_POST['price']=='' || $_POST['stall_name']=='' || $_POST['college_name']=='')
    {   
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>All fields must be filled!</strong>
                  </div>';
    }
    else
    {
        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = pathinfo($fname, PATHINFO_EXTENSION);
        $store = "../images/stall_img/" . basename($fname); 

        if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
        {        
            if($fsize >= 1000000)
            {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Max Image Size is 1024KB!</strong> Try a different image.
                          </div>';
            }
            else
            {
                $sql = "UPDATE ukmdinedash_items SET stall_id='$_POST[stall_name]', title='$_POST[item_name]', price='$_POST[price]', img='$fname', college_id='$_POST[college_name]' WHERE itm_id='$_GET[item_update]'";
                mysqli_query($db, $sql); 
                move_uploaded_file($temp, $store);

                $success = '<div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Record Updated!</strong>
                            </div>';
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Menu</title>
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
                                <img src="images/manager.png" alt="user" class="profile-pic" style="width: 18%; float: right;" />
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
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
                        <h4 class="m-b-0 text-white">Update Item</h4>
                    </div>
                    <div class="card-body">
                        <form action='' method='post' enctype="multipart/form-data">
                            <div class="form-body">
                                <?php
                                $qml ="SELECT * FROM ukmdinedash_items WHERE itm_id='$_GET[item_update]'";
                                $rest = mysqli_query($db, $qml);
                                $roww = mysqli_fetch_array($rest);
                                ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Item Name</label>
                                            <input type="text" name="item_name" value="<?php echo $roww['title'];?>" class="form-control" placeholder="Morzirella" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Item Price (RM)</label>
                                            <input type="text" name="price" value="<?php echo $roww['price'];?>" class="form-control" placeholder="RM" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Image</label>
                                            <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Select Stall</label>
                                            <select name="stall_name" class="form-control custom-select" data-placeholder="Choose a Stall" tabindex="1" required>
                                                <option>--Select Stall--</option>
                                                <?php
                                                $ssql ="SELECT * FROM ukmdinedash_stalls";
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
                                            <select name="college_name" class="form-control custom-select" data-placeholder="Choose a College" tabindex="1" required>
                                            <option>--Select College--</option>
                                                <?php
                                                $csql ="SELECT * FROM ukmdinedash_colleges";
                                                $cres = mysqli_query($db, $csql);
                                                while($crow = mysqli_fetch_array($cres)) {
                                                    echo '<option value="'.$crow['college_id'].'">'.$crow['college_name'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update Item">
                                <a href="all_items.php" class="btn btn-inverse">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
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
