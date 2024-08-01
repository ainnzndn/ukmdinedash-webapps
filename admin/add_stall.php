<!DOCTYPE html>
                <html lang="en">
                <?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))          
{
		if(empty($_POST['college_name'])||empty($_POST['stall_name'])||$_POST['seller_name']==''||$_POST['seller_password']==''||$_POST['email']==''||$_POST['phone']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
                                                        } else {
                                                            $fname = $_FILES['file']['name']; // Original file name
                                                            $temp = $_FILES['file']['tmp_name'];
                                                            $fsize = $_FILES['file']['size'];
                                                            $extension = pathinfo($fname, PATHINFO_EXTENSION);
                                                            $store = "../images/stall_img/" . $fname; // Destination path with original file name
                                                    
                                                            if(in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                                                if($fsize >= 1000000) {
                                                                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <strong>Max Image Size is 1024KB!</strong> Try a different image.
                                                                            </div>';
                                                                } else {
                                                                    // Insert stall data into database
                                                                    $stall_name = $_POST['stall_name'];
                                                                    $sql = "INSERT INTO ukmdinedash_stalls(college_id, stall_name, seller_name, seller_password, email, phone, o_hr, c_hr, o_days, address, image) VALUES ('".$_POST['college_name']."', '".$stall_name."', '".$_POST['seller_name']."', '".$_POST['seller_password']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['o_hr']."', '".$_POST['c_hr']."', '".$_POST['o_days']."', '".$_POST['address']."', '".$fname."')";
                                                                    mysqli_query($db, $sql);
                                                                    
                                                                    // Move uploaded file to destination
                                                                    move_uploaded_file($temp, $store);
                                                    
                                                                    $success = '<div class="alert alert-success alert-dismissible fade show">
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                    New Stall Added Successfully.
                                                                                </div>';
                                                                }
                                                            } elseif($fname == '') {
                                                                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <strong>Select Image</strong>
                                                                        </div>';
                                                            } else {
                                                                $error = '<div class="alert alert-danger alert-dismissible fade show">
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <strong>Invalid extension!</strong> Only PNG, JPG, GIF are accepted.
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
                    <title>Add New Stall</title>
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
                                <?php  echo $error;
									        echo $success; ?>

                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                            <h4 class="m-b-0 text-white">Add New Stall</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action='' method='post' enctype="multipart/form-data">
                                                <div class="form-body">

                                                <hr>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Stall Name</label>
                                                                <input type="text" name="stall_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" name="seller_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email Address</label>
                                                                <input type="text" name="email" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Password</label>
                                                                <input type="text" name="seller_password" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone Number</label>
                                                                <input type="text" name="phone" class="form-control">
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address</label>
                                                                <input type="text" name="address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Opening Hours</label>
                                                                <select name="o_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                                    <option>--Select Operating Hours--</option>
                                                                    <option value="8AM">8AM</option>
                                                                    <option value="9AM">9AM</option>
                                                                    <option value="10AM">10AM</option>
                                                                    <option value="11AM">11AM</option>
                                                                    <option value="12AM">12PM</option>
                                                                    <option value="3PM">1PM</option>
                                                                    <option value="3PM">2PM</option>
                                                                    <option value="3PM">3PM</option>
                                                                    <option value="4PM">4PM</option>
                                                                    <option value="5PM">5PM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Closing Hours</label>
                                                                <select name="c_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                                                                    <option>--Select Closing Hours--</option>
                                                                    <option value="5PM">5PM</option>
                                                                    <option value="6PM">6PM</option>
                                                                    <option value="7PM">7PM</option>
                                                                    <option value="8PM">8PM</option>
                                                                    <option value="9PM">9PM</option>
                                                                    <option value="10PM">10PM</option>
                                                                    <option value="11PM">11PM</option>
                                                                    <option value="11PM">12AM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Business Days</label>
                                                                <select name="o_days" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option>--Select Business Days--</option>
                                                                    <option value="Mon-Tue">Mon-Tue</option>
                                                                    <option value="Mon-Wed">Mon-Wed</option>
                                                                    <option value="Mon-Thu">Mon-Thu</option>
                                                                    <option value="Mon-Fri">Mon-Fri</option>
                                                                    <option value="Mon-Sat">Mon-Sat</option>
                                                                    <option value="Everyday">Everyday</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Stall Image</label>
                                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Select College</label>
                                                                <select name="college_name" class="form-control custom-select" data-placeholder="Choose a College" tabindex="1">
                                                                    <option>--Select College--</option>
                                                                    <?php $ssql ="select * from ukmdinedash_colleges";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';;
													}  
                                                 
													?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    


                                                </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Add Stall">
                                            <a href="add_stall.php" class="btn btn-inverse">Cancel</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php include "include/footer.php" ?>
                        </div>

                    </div>

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