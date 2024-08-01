<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
session_start();
if (empty($_SESSION["admin_id"])) {
    header('location:index.php');
    exit;
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
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
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Customers</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Stalls</span></a>
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
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Admin Dashboard</h4>
                        </div>
                        <div class="row">
                            <?php
                            function fetch_count($db, $query) {
                                $result = mysqli_query($db, $query);
                                return mysqli_num_rows($result);
                            }

                            $cards = [
                                ["icon" => "fa-home", "query" => "SELECT * FROM ukmdinedash_stalls", "label" => "Stalls"],
                                ["icon" => "fa-cutlery", "query" => "SELECT * FROM ukmdinedash_items", "label" => "Items"],
                                ["icon" => "fa-users", "query" => "SELECT * FROM ukmdinedash_users", "label" => "Customers"],
                                ["icon" => "fa-shopping-cart", "query" => "SELECT * FROM ukmdinedash_users_orders", "label" => "Total Orders"],
                                ["icon" => "fa-th-large", "query" => "SELECT * FROM ukmdinedash_colleges", "label" => "Colleges"],
                                ["icon" => "fa-spinner", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'preparing'", "label" => "Preparing Order"],
                                ["icon" => "fa-check", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'completed'", "label" => "Completed Order"],
                                ["icon" => "fa-times", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'cancelled'", "label" => "Cancelled Order"]
                            ];

                            foreach ($cards as $card) {
                                echo "
                                <div class='col-md-3'>
                                    <div class='card p-30'>
                                        <div class='media'>
                                            <div class='media-left media media-middle'>
                                                <span><i class='fa {$card['icon']} f-s-40'></i></span>
                                            </div>
                                            <div class='media-body media-text-right'>
                                                <h2>" . fetch_count($db, $card['query']) . "</h2>
                                                <p class='m-b-0'>{$card['label']}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }

                            $result = mysqli_query($db, 'SELECT SUM(price) AS value_sum FROM ukmdinedash_users_orders WHERE status = "completed"');
                            $row = mysqli_fetch_assoc($result);
                            $total_earnings = $row['value_sum'];
                            ?>
                            <div class='col-md-3'>
                                <div class='card p-30'>
                                    <div class='media'>
                                        <div class='media-left media media-middle'>
                                            <span><i class='fa fa-usd f-s-40' aria-hidden='true'></i></span>
                                        </div>
                                        <div class='media-body media-text-right'>
                                            <h2><?php echo 'RM' . $total_earnings; ?></h2>
                                            <p class='m-b-0'>Total Earnings</p>
                                        </div>
                                    </div>
                                </div>
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

