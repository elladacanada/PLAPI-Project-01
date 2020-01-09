<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "PLAPI_Project01";

// Create databse object and connect
$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check Connection
if($db->connect_error){
    // if you cant connect to db it will kill connection and pass the last mysqli error to the screen
    die('Connection failed: ' . $db->connect_error);
}

?>

