<?php
session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Website</title>
    <link rel="stylesheet" type="text/css" href="styles/navbar.css" media="screen" />
</head>
<body>

<?php include("html/navbar.html");?>

You logged out successfully. Back to <a href="login.php">Login</a>.
</body>
