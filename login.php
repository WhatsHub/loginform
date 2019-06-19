<?php
session_start();
require "inc/config.inc.php";
require "inc/function.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php
if (isset($_GET["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql_query_user = "SELECT * FROM users WHERE email = '$email'";

    $result = $conn->query($sql_query_user);

    if ($result->num_rows > 0) {
       $userinfo = $result->fetch_row();
       console_log($userinfo);

       if (password_verify($password, $userinfo[2])){
           // Session variable set to userid
           $_SESSION["userid"] = $userinfo[0];
           console_log($_SESSION["userid"]);
           //TODO: create intern.php
           die('Login successful. Forward to <a href="intern.php">intern section.</a>');
       }

    } else {
        echo "ERROR: Incorrect email or password <br>";
    }
}
?>

<h2> Login </h2>

<form action="?login=1" method="post">
    Please enter your,<br><br>
    E-Mail:<br>
    <input type="email" name="email"><br>

    Password: <br>
    <input type="password" name="password"><br>

    <input type="submit" value="Submit!">
</form>
</body>