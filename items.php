<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Items || UKMDineDash Food Order System</title>
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
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="#">Choose Preferred Stall</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="items.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your Food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Make Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <?php 
        // Fetch stall details
        $ress = mysqli_query($db,"select * from ukmdinedash_stalls where stall_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>
        <section class="inner-page-hero2 custom-bg-item">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="images/stall_img/'.$rows['image'].'" alt="Stall Image">'; ?></figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
    <div class="pull-left right-text white-txt">
        <p style="font-size: 30px;"><strong><?php echo $rows['stall_name']; ?></strong></p>
        <p style="font-size: 24px;"><strong><?php echo $rows['address']; ?></strong></p>
        <p style="font-size: 14px;"><strong>Opening Hours:</strong> <?php echo $rows['o_hr']; ?> - <?php echo $rows['c_hr']; ?></p>
        <p style="font-size: 14px;"><strong>Operating Days:</strong> <?php echo $rows['o_days']; ?></p>
    </div>
</div>

                    </div>
                </div>
            </div>
        </section>

        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>

        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Cart
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="items.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["itm_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "RM".$item["price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>
                                    </div>

                                <?php
                                    $item_total += ($item["price"]*$item["quantity"]); 
                                }
                                ?>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "RM" . number_format($item_total, 1) . "0"; ?></strong></h3>
                                <?php if($item_total==0) { ?>
                                    <a href="#" class="btn btn-danger btn-lg disabled">Checkout</a>
                                <?php } else { ?>
                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                MENU <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php  
                                $stmt = $db->prepare("select * from ukmdinedash_items where stall_id='$_GET[res_id]'");
                                $stmt->execute();
                                $products = $stmt->get_result();
                                if (!empty($products)) {
                                    foreach($products as $product) {
                            ?>
                                    <div class="food-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-8">
                                                <div class="rest-logo pull-left">
                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="images/stall_img/'.$product['img'].'" alt="Food Image">'; ?></a>
                                                </div>

                                                <div class="rest-descr">
                                                    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                    <p> <?php echo $product['slogan']; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
                                                <span class="price pull-left">RM <?php echo $product['price']; ?></span>
                                                <button type="button" class="btn theme-btn" data-toggle="modal" data-target="#order-modal-<?php echo $product['itm_id']; ?>">Add To Cart</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="order-modal-<?php echo $product['itm_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="order-modal-<?php echo $product['itm_id']; ?>-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="order-modal-<?php echo $product['itm_id']; ?>-label"><?php echo $product['title']; ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="item-img pull-left">
                                                        <a class="restaurant-logo pull-left" href="#">
                                                        <?php echo '<img src="images/stall_img/'.$product['img'].'" alt="Food Image" style="max-width: 100%; height: auto;">'; ?>
                                                        </a>
                                                    </div>

                                                    <div class="rest-descr">
                                                        <p><?php echo $product['description']; ?></p>
                                                        <p>Price: RM <?php echo $product['price']; ?></p>
                                                        <form method="post" action='items.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['itm_id']; ?>'>
                                                            <div class="form-group">
                                                                <label for="quantity">Quantity:</label>
                                                                <input type="text" class="form-control" name="quantity" value="1">
                                                            </div>
                                                            <button type="submit" class="btn theme-btn">Add To Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
