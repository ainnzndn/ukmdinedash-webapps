<?php
session_start();

// Check if the user clicked 'OK' on the confirmation dialog
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    session_destroy(); 
    $url = 'index.php';
    header('Location: ' . $url);
    exit(); // Make sure to exit after redirection
}

// If the user hasn't confirmed yet, show the confirmation message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout Confirmation</title>
</head>
<body>

<script>
// JavaScript confirmation dialog
if (confirm("Are you sure you want to logout?")) {
    // If user clicks 'OK', redirect with confirmation
    window.location.href = 'logout.php?confirm=yes';
} else {
    // If user clicks 'Cancel', redirect without confirmation
    window.location.href = 'index.php';
}
</script>

</body>
</html>
