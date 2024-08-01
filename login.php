<?php
session_start();
include("connection/connect.php");
error_reporting(0);

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM ukmdinedash_users WHERE username='$username' && password='".md5($password)."'"; 
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	    if(is_array($row)) 
		{
            $_SESSION["user_id"] = $row['u_id']; 
		    header("refresh:1;url=index.php"); 
	    } 
		else
		{
            $message = "Invalid Username or Password!"; 
        }
	 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Login || UKMDineDash Food Order System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .background-image {
            background-image: url('images/img/pimg.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
        }
        .form-module {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }
        .form-module .form h2 {
            margin-bottom: 20px;
        }
        .form-module .cta {
            margin-top: 20px;
            text-align: center;
        }
        .center-container {
            padding-top: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-bottom: 90px;
        }
        .top-links { 
            margin-top: 50px; }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt="" width="12%"> </a>
                <div class="collapse navbar-toggleable-md float-lg-right flex center;" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php" style="color: #724100;">Home<span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="colleges.php" style="color: #724100;">Colleges<span class="sr-only"></span></a> </li>

                        <?php
                        if(empty($_SESSION["user_id"])) // if user is not login
                            {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active" style="color: #724100;">Login</a> </li>
                            <li class="nav-item"><a href="registration.php" class="nav-link active" style="color: #724100;">Register</a> </li>';
                            }
                        else
                            {                                   
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active" style="color: #724100;">My Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active" style="color: #724100;">Logout</a> </li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="center-container">
        <div class="widget">
            <div class="widget-body form-module">
                <form action="" method="post">
                    <div class="form top">
                        <h2 style="color:#724100;">Login to your account</h2>
                        <span style="color:red;"><?php echo $message; ?></span>
                        <span style="color:green;"><?php echo $success; ?></span>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="buttn" name="submit" value="Login" class="btn btn-block" style="background-color: #724100; color: #fff;">
                        </div>
                    </div>
                </form>
                <div class="cta">Not registered? <a href="registration.php" style="color:#724100;">Create an account</a></div>
                <div class="cta">
                    Login as
                    <a href="http://lrgs.ftsm.ukm.my/users/a187911/ukmdinedash/admin/index.php" style="color:#724100;">Admin</a>
                    or
                    <a href="http://lrgs.ftsm.ukm.my/users/a187911/ukmdinedash/seller/index.php" style="color:#724100;">Seller</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php" ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>

