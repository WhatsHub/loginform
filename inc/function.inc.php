<?php

/*
 * Function: console_log
 * prints data to the browsers console
 * @param $msg Data to print to the console
 */
function console_log($msg){
    echo "<script> console.log(".json_encode($msg).")</script>";
}
?>

