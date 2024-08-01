<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Stalls || UKMDineDash Food Order System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .top-links { margin-top: 40px; }
    </style>
</head>

<body>

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
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="stalls.php?college_id=<?php echo $_GET['college_id']; ?>">Choose Preferred Stall</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your Food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Make Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <div class="inner-page-hero bg-image" data-image-src="images/img/pimg2.png">
            <div class="container"> </div>
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>

        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php 
                                $college_id = $_GET['college_id'];
                                
                                $ress= mysqli_query($db, "SELECT * FROM ukmdinedash_stalls WHERE college_id = $college_id");
                                while($rows = mysqli_fetch_array($ress)) { ?>
                                    <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                        <div class="entry-logo">
                                            <a class="img-fluid" href="items.php?res_id=<?php echo $rows['stall_id']; ?>"> <img src="images/stall_img/<?php echo $rows['image']; ?>" alt="Stall Image"></a>
                                        </div>
                                        <div class="entry-dscr">
                                        <h5><a href="items.php?res_id=<?php echo $rows['stall_id']; ?>"><?php echo $rows['stall_name']; ?></a></h5>
                                            <span style="font-weight: 500; color: black;"><?php echo $rows['address']; ?></span><br>
                                            <span style="font-weight: 400; color: #777; font-size: 14px;">Operating Days: <?php echo $rows['o_days']; ?></span><br>
                                            <span style="font-weight: normal; color: #777; font-size: 14px;">Business Hours: <?php echo $rows['o_hr']; ?> - <?php echo $rows['c_hr']; ?></span>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                        <div class="right-content bg-white">
                                            <div class="right-review">
                                                <a href="items.php?res_id=<?php echo $rows['stall_id']; ?>" class="btn btn-purple">View Stall</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "include/footer.php"; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </div>
</body>
</html>
