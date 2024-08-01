<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Stalls</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">

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
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">All Stalls</h4>
                            </div>

                            <div class="table-responsive m-t-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control" placeholder="Search Stall...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>

                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 150px;">College Name</th>
                                            <th style="width: 120px;">Stall Name</th>
                                            <th style="width: 100px;">Seller Name</th>
                                            <th style="width: 150px;">Stall Email</th>
                                            <th style="width: 120px;">Stall Phone</th>
                                            <th style="width: 100px;">Opening Hours</th>
                                            <th style="width: 100px;">Closing Hours</th>
                                            <th style="width: 120px;">Business Days</th>
                                            <th style="width: 150px;">Stall Address</th>
                                            <th style="width: 80px;">Image</th>
                                            <th style="width: 100px;">Date</th>
                                            <th style="width: 80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                                        $sql = "SELECT * FROM ukmdinedash_stalls";

                                        if (!empty($search)) {
                                            $sql .= " WHERE stall_name LIKE '%$search%'"; 
                                        }

                                        $sql .= " ORDER BY stall_id DESC";

                                        $query = mysqli_query($db, $sql);

                                        if (mysqli_num_rows($query) > 0) {
                                            while ($rows = mysqli_fetch_array($query)) {
                                                $mql = "SELECT * FROM ukmdinedash_colleges WHERE college_id='" . $rows['college_id'] . "'";
                                                $res = mysqli_query($db, $mql);
                                                $row = mysqli_fetch_array($res);

                                                echo '<tr>
                                                        <td>' . $row['college_name'] . '</td>
                                                        <td>' . $rows['stall_name'] . '</td>
                                                        <td>' . $rows['seller_name'] . '</td>
                                                        <td>' . $rows['email'] . '</td>
                                                        <td>' . $rows['phone'] . '</td>
                                                        <td>' . $rows['o_hr'] . '</td>
                                                        <td>' . $rows['c_hr'] . '</td>
                                                        <td>' . $rows['o_days'] . '</td>
                                                        <td>' . $rows['address'] . '</td>
                                                        <td>
                                                            <div class="m-b-10">
                                                                <center><img src="../images/stall_img/' . $rows['image'] . '" class="img-responsive radius" style="min-width:50px;min-height:50px;"/></center>
                                                            </div>
                                                        </td>
                                                        <td>' . $rows['date'] . '</td>
                                                        <td>
                                                            <a href="delete_stalls.php?stall_del=' . $rows['stall_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                            <a href="update_stalls.php?stall_update=' . $rows['stall_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="11"><center>No Stall Registered</center></td></tr>';
                                        }
                                        ?>
                                    </tbody>
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
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
