<?php
require_once("../conn.php");

//if search is set, is not blank, get the search or return false
$search_model = isset($_POST["search_model"]) && $_POST["search_model"] != "" ? $_POST["search_model"] : false;
$search_nickname = isset($_POST["search_nickname"]) && $_POST["search_nickname"] != "" ? $_POST["search_nickname"] : false;
$year = isset($_POST["year"]) ? $_POST["year"] : false;

$search_model = $db->real_escape_string(trim($search_model)); //checks if string from post has strange characters and prevents from sql injection attack
$search_nickname = $db->real_escape_string(trim($search_nickname)); 
$year = $db->real_escape_string($year);

if($search_model || $search_nickname || $year) {

    $search_sql = " SELECT * FROM cars
                    WHERE nickname LIKE '%$search_nickname%' AND CONCAT_WS('',model, make)  LIKE '%$search_model%'";

    if($year != 0) {
        $search_sql .= "AND year = $year";
    }

} else {
    $search_sql = " SELECT * FROM cars";
}

$result = $db->query($search_sql); //get infor from db

$cars = array();
while($row = $result->fetch_assoc()){
    // print_r($row);
    $cars[] = $row; // append row to the $cars array we made above the while statement.
}

$db->close(); // can close your connection when you are finished.  helps with speed

echo json_encode($cars); //echoeing special text known as json. returns results in javascript object notation.


?>