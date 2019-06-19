<?php
session_start();
session_destroy();

print_navbar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Website</title>
</head>
<body>
You logged out successfully. Back to <a href="login.php">Login</a>.
</body>
