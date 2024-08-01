<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
session_start();
if(isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}
if(isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['seller_password']; 
    if(!empty($username) && !empty($password)) {
        $loginquery = "SELECT * FROM ukmdinedash_stalls WHERE email=? LIMIT 1";
        $stmt = $db->prepare($loginquery);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if($password === $row['seller_password']) {
                $_SESSION["email"] = $row['email']; 
                header("Location: dashboard.php");
                exit();
            } else {
                $message = "Invalid Password!";
            }
        } else {
            $message = "Invalid Username!";
        }
    } else {
        $message = "Username and Password are required!";
    }
}

?>
<head>
    <meta charset="UTF-8">
    <title>Seller Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="info">
            <h1>Seller Panel</h1>
        </div>
    </div>
    <div class="form">
        <div class="thumbnail"><img src="images/manager.png" /></div>
        <span style="color:red;"><?php echo isset($message) ? $message : ''; ?></span>
        <form class="login-form" action="index.php" method="post">
            <input type="text" placeholder="Seller Email" name="email" required />
            <input type="password" placeholder="Password" name="seller_password" required /> 
            <input type="submit" name="submit" value="Login" />
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='js/index.js'></script>
</body>
</html>
