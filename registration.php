<?php
session_start();
error_reporting(E_ALL);
include("connection/connect.php");

function endsWith($string, $endString) {
    $len = strlen($endString);
    return (substr($string, -$len) === $endString);
}

if(isset($_POST['submit'])) {
    if(empty($_POST['username']) || empty($_POST['matric_num']) || empty($_POST['firstname']) || empty($_POST['lastname']) ||
       empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['password']) || empty($_POST['cpassword'])) {
        echo "<script>alert('All fields must be filled!');</script>";
    } else {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $matric_num = mysqli_real_escape_string($db, $_POST['matric_num']);
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $check_username = mysqli_query($db, "SELECT username FROM ukmdinedash_users WHERE username = '$username'");
        $check_email = mysqli_query($db, "SELECT email FROM ukmdinedash_users WHERE email = '$email'");
        $check_matric_num = mysqli_query($db, "SELECT matric_num FROM ukmdinedash_users WHERE matric_num = '$matric_num'");


        if($password != $cpassword) {
            echo "<script>alert('Passwords do not match');</script>";
        } elseif(strlen($password) < 6) {
            echo "<script>alert('Password must be at least 6 characters long');</script>";
        } elseif(strlen($phone) < 10) {
            echo "<script>alert('Invalid Phone Number');</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid UKM Email Address');</script>";
        } elseif (!endsWith($email, '@ukm.edu.my') && !endsWith($email, '@siswa.ukm.edu.my')) {
            echo "<script>alert('Invalid UKM Email Address');</script>";
        } elseif(mysqli_num_rows($check_username) > 0) {
            echo "<script>alert('Username already exist!');</script>";
        } elseif(mysqli_num_rows($check_email) > 0) {
            echo "<script>alert('Email already exist!');</script>";
        } elseif(mysqli_num_rows($check_matric_num) > 0) {
            echo "<script>alert('Matric Number already exist!');</script>";
        } else {
            $hashed_password = md5($password);
            $query = "INSERT INTO ukmdinedash_users (username, matric_num, f_name, l_name, email, phone, password)
                      VALUES ('$username', '$matric_num', '$firstname', '$lastname', '$email', '$phone', '$hashed_password')";

            if(mysqli_query($db, $query)) {
                header("Location: login.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($db) . "');</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Registration || UKMDineDash Food Order System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .background-image {
            background-image: url('images/img/pimg3.png');
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
    <div class="page-wrapper">
        <div class="container">
            <ul></ul>
        </div>
        <section class="contact-page inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input class="form-control" type="text" name="username" id="example-text-input" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Matric Number</label>
                                            <input class="form-control" type="text" name="matric_num" id="example-text-input" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input class="form-control" type="text" name="firstname" id="example-text-input" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input class="form-control" type="text" name="lastname" id="example-text-input-2" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">UKM Email Address</label>
                                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Phone Number</label>
                                            <input class="form-control" type="text" name="phone" id="example-tel-input-3" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "include/footer.php" ?>

    </div>

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
