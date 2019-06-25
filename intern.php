<?php
session_start();
require "inc/config.inc.php";
require "inc/function.inc.php";
if (!isset($_SESSION["userid"])){
    die('Please login first at <a href=login.php>Login</a>');
}

// TODO: make a php function that prints the Document header into the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Website</title>
    <link rel="stylesheet" type="text/css" href="styles/navbar.css" media="screen" />
</head>
<body>


<?php include("html/navbar.html"); ?>

Hello <?php echo $_SESSION["userid"] ?> Congratulations you logged in succesfully and can now see this secret website!
<br>
<br>

Here is the table of all users that are currently registered: <br> <br>

    <?php

    // print table of users
        echo "<table id='users'>";
        echo "    <tr> <th>id</th>  <th>email</th> <th>password</th> <th>firstname</th> <th>lastname</th> <th>created at</th> <th>updated at</th> </tr>";
        // get all the entrys from the table
        $result = $conn->query("SELECT * FROM users");
       if ($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
               echo "<tr><td>" . $row['id'] . "</td><td>" .$row['email'] . "</td><td>".$row['password']."</td><td>" .
                   $row['firstname'] . "</td><td>".$row['lastname']." </td><td>".$row['created_at']."</td><td>".$row['updated_at']."</td></tr>";

           }
       }
       else{
           echo "<tr><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
       }
       echo "</table>";
    ?>

<a href="logout.php">Logout.</a>
</body>
