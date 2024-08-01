<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thank you. Your order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

		foreach ($_SESSION["cart_item"] as $item) {
			$item_total += ($item["price"]*$item["quantity"]);
				if($_POST['submit']) {
					$SQL="insert into ukmdinedash_users_orders(u_id,title,quantity,price,stall_id,stall_name,college_name) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$item["stall_id"]."','".$item["stall_name"]."','".$item["college_name"]."')";
						mysqli_query($db,$SQL);
						unset($_SESSION["cart_item"]);
                        unset($item["title"]);
                        unset($item["quantity"]);
                        unset($item["price"]);
                        unset($item["stall_id"]);
                        unset($item["stall_name"]);
                        unset($item["college_name"]);
						$success = "Thank you. Your order has been placed!";
                        function_alert();	
                    }
                }

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout || UKMDineDash Food Order System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .top-links { margin-top: 30px; }
    </style>
</head>

<body>
    <div class="site-wrapper">
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
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="#">Choose Colleges</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your Food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Make Order and Pay</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">

                <span style="color:green;">
                    <?php echo $success; ?>
                </span>
            </div>
            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                    <div class="widget-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4>
                                        </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($_SESSION["cart_item"] as $item) {
                                                        $item_price = $item["price"] * $item["quantity"];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $item["title"]; ?></td>
                                                            <td><?php echo $item["quantity"]; ?></td>
                                                            <td><?php echo "RM" . number_format($item["price"], 2); ?></td>
                                                            <td><?php echo "RM" . number_format($item_price, 2); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="3" class="text-right"><strong>Cart Subtotal</strong></td>
                                                        <td class="text-color"><strong><?php echo "RM" . number_format($item_total, 2); ?></strong></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                        <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-20">
                                                        <input name="mod" id="radioStacked1"  type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Pay at Counter</span>
                                                    </label>
                                                </li>
                                                <!-- <li>
                                                    <label class="custom-control custom-radio  m-b-10">
                                                        <input name="mod" type="radio" value="onlinetransaction" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Online Transaction  <img src="images/toyyibpay.png" alt="" width="90"></span> </label>
                                                </li> -->
                                            </ul>
                                            <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
                                        </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
    
    <?php include "include/footer.php" ?>
    </div>
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
<?php
}
?>