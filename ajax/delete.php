<?php
require_once("../conn.php");

//if id is set
//delete from db
//return success message
$car_id = (isset($_POST["id"])) ? intval($_POST["id"]) : false;

if($car_id){
    
    $delete_query = " DELETE FROM cars WHERE id =". $car_id;
    
    $db->query($delete_query);

    echo ("🤯");
}


?>