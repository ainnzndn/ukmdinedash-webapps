<?php
include("../connection/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(strlen($_SESSION['email'])==0)
{ 
    header('location:../login.php');
}

$user_email = $_SESSION['email'];

$stall_query = "SELECT stall_name FROM ukmdinedash_stalls WHERE email = '$user_email'";
$stall_result = mysqli_query($db, $stall_query);

if ($stall_result && mysqli_num_rows($stall_result) > 0) {
    $stall_row = mysqli_fetch_assoc($stall_result);
    $stall_name = $stall_row['stall_name'];

    $sql = "SELECT u.username, o.o_id, o.title, o.quantity, o.price, o.status, o.date, o.stall_name, o.college_name
            FROM ukmdinedash_users u
            INNER JOIN ukmdinedash_users_orders o ON u.u_id = o.u_id
            WHERE o.stall_name = '$stall_name'";
    $query = mysqli_query($db, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
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
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">All Orders</h4>
                            </div>

                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>College Name</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_earnings = 0; // Initialize total earnings variable
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($rows = mysqli_fetch_array($query)) {
                                                $total_earnings += $rows['price']; // Accumulate total earnings
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['username']; ?></td>
                                            <td><?php echo $rows['title']; ?></td>
                                            <td><?php echo $rows['quantity']; ?></td>
                                            <td>RM<?php echo $rows['price']; ?></td>
                                            <td><?php echo $rows['college_name']; ?></td>
                                            <td>
                                                <?php
                                                $status = $rows['status'];
                                                if ($status == "" || $status == "NULL") {
                                                ?>
                                                    <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span>Order Received</button>
                                                <?php 
                                                } elseif ($status == "preparing") {
                                                ?>
                                                    <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>Preparing Order</button>
                                                <?php
                                                } elseif ($status == "completed") {
                                                ?>
                                                    <button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span>Order Completed</button>
                                                <?php 
                                                } elseif ($status == "cancelled") {
                                                ?>
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-close"></i>Order Cancelled</button>
                                                <?php 
                                                } 
                                                ?>
                                            </td>
                                            <td><?php echo $rows['date']; ?></td>
                                            <td>
                                                <a href="delete_orders.php?order_del=<?php echo $rows['o_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                <a href="view_order.php?user_update=<?php echo $rows['o_id'];?>" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }    
                                        } else {
                                            echo "<tr><td colspan='8'>No orders found for this stall.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="1"><strong>Total Earnings:</strong></td>
                                            <td colspan="2"></td>
                                            <td><strong>RM<?php echo number_format($total_earnings, 2); ?></strong></td>
                                            <td colspan="4"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php" ?>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
