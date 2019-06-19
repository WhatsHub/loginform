<?php

/*
 * Function: console_log
 * prints data to the browsers console
 * @param $msg Data to print to the console
 */
function console_log($msg){
    echo "<script> console.log(".json_encode($msg).")</script>";
}

/*
 * Funtion: print_navbar
 * prints the navbar into the html document
 */
function print_navbar() {
    echo "
    <ul>
        <li><a class=\"active\" href=\"#home\">Home</a></li>
        <li><a href=\"#news\">News</a></li>
        <li><a href=\"#contact\">Contact</a></li>
        <li><a href=\"#about\">About</a></li>
    </ul>
    ";
}
?>

