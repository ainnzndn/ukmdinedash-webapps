<?php
session_start();
include("../connection/connect.php");

if (empty($_SESSION["email"])) {
    header('location:index.php');
    exit;
}

$email = $_SESSION["email"];

$query_stall_name = "SELECT stall_name FROM ukmdinedash_stalls WHERE email = '$email'";
$result_stall_name = mysqli_query($db, $query_stall_name);
$row_stall_name = mysqli_fetch_assoc($result_stall_name);
$stall_name = $row_stall_name['stall_name'];

function fetch_count($db, $query) {
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}

$cards = [
    ["icon" => "fa-cutlery", "query" => "SELECT * FROM ukmdinedash_items WHERE stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')", 
    "label" => "Items"],
    ["icon" => "fa-shopping-cart", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')", 
    "label" => "Total Orders"],
    ["icon" => "fa-spinner", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'preparing' AND stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')", 
    "label" => "Preparing Order"],
    ["icon" => "fa-check", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'completed' AND stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')", 
    "label" => "Completed Order"],
    ["icon" => "fa-times", "query" => "SELECT * FROM ukmdinedash_users_orders WHERE status = 'cancelled' AND stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')", 
    "label" => "Cancelled Order"]
];

$query_total_earnings = "SELECT SUM(price) AS value_sum 
                        FROM ukmdinedash_users_orders 
                        WHERE status = 'completed' 
                        AND stall_id IN (SELECT stall_id FROM ukmdinedash_stalls WHERE email = '$email')";
$result_total_earnings = mysqli_query($db, $query_total_earnings);
$row_total_earnings = mysqli_fetch_assoc($result_total_earnings);
$total_earnings = $row_total_earnings['value_sum'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Seller Panel</title>
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Items</span></a>
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
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Seller Dashboard</h4>
                            <?php
                            if (!empty($stall_name)) {
                                echo "<p class='text-white'>$stall_name</p>";
                            }
                            ?>
                        </div>
                        <div class="row">
                            <?php
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
                            ?>
                            <div class='col-md-3'>
                                <div class='card p-30'>
                                    <div class='media'>
                                        <div class='media-left media media-middle'>
                                            <span><i class='fa fa-usd f-s-40' aria-hidden='true'></i></span>
                                        </div>
                                        <div class='media-body media-text-right'>
                                            <h2><?php echo 'RM' . number_format($total_earnings, 2); ?></h2>
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
