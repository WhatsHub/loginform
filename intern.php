<?php
session_start();
require "inc/config.inc.php";
require "inc/function.inc.php";
console_log($_SESSION["userid"]);
if (!isset($_SESSION["userid"])){
    die('Please login first at <a href=login.php>Login</a>');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Website</title>
</head>
<body>
Hello <?php echo $_SESSION["userid"] ?> Congratulations you logged in succesfully and can now see this secret website!
<br>
<br>
<a href="logout.php">Logout.</a>
</body>
