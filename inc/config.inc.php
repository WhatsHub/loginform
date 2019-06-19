<?php
/*
 * Configuration File for mysql
 * creates the mysqli connection object $conn
 */
$servername = "localhost";
$dbname = "loginsystem";
$username = "loginsystem";
$password = "1234";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
