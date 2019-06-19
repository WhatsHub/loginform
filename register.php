<?php
session_start();
require "inc/config.inc.php";
require "inc/function.inc.php";

print_navbar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

<?php
$showform = true;

// check if connected successfully
if ($conn->connect_error){
    die("Connection to database failed: " . $conn->connect_error);
}
// print if successfull
console_log("Connected successfully to database :)\n");

// perform this wenn submit button is pressed
if (isset($_GET["register"])){
    $error = false;
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    // is entered email valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Please enter valid email address. <br>";
        $error = true;
    }

    // is password not empty
    if (strlen($password1) == 0){
        echo "Please enter a password. <br>";
        $error = true;
    }

    // do passwords match
    if ($password1 != $password2) {
        echo "Your passwords don't match. <br>";
        $error = true;
    }

    // is email already registered?
   if (!$error){
       $sql_query_getemail = "SELECT * FROM users WHERE email = $email";

       $sql_result = $conn->query($sql_query_getemail);

       if ($sql_result->num_rows > 0) {
           echo "This E-mail is already registered. <br>";
           $error = true;
       }
   }

   if (!$error) {

       $password_hash = password_hash($password1, PASSWORD_DEFAULT);
       console_log($password_hash);

       $sql_query_insertuser= "INSERT INTO users (email, password, firstname, lastname) VALUES ('$email', '$password_hash', '$firstname', '$lastname')";

       if ($conn->query($sql_query_insertuser) === TRUE) {
          echo "You were successfully registered. <br>";
          $showform = false;
       } else {
           echo "A Error has occured: Error: " . $sql_query_insertuser . "<br>" . $conn->error;
       }
   }


}

$conn->close();
?>

<?php
if($showform) { ?>
    <h2> Register </h2>

    <form action="?register=1" method="post">
        First name: <br>
        <input type="text" name="firstname" value="<?php if($firstname != NULL) echo $firstname; ?>"><br>

        Last name: <br>
        <input type="text" name="lastname" value="<?php if($lastname != NULL) echo $lastname; ?>"><br>
        <br>
        <br>
        E-Mail:<br>
        <input type="email" name="email" value="<?php if($email != NULL) echo $email; ?>"><br>

        Password: <br>
        <input type="password" name="password1"><br>

        Repeat password:<br>
        <input type="password" name="password2"><br>
        <br>
        <input type="submit" value="Submit!">
    </form>
    <?php
}
?>
</body>
</html>