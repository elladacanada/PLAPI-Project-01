<?php
require_once("../conn.php");


$new_make = (isset($_POST["make"])) ? $_POST["make"] : false;
$new_model = (isset($_POST["model"])) ? $_POST["model"] : false;
$new_year = (isset($_POST["year"])) ? $_POST["year"] : false;
$new_nickname = (isset($_POST["nickname"])) ? $_POST["nickname"] : false;





if($new_make && $new_model && $new_year && $new_nickname){
    
    $insert_query = "   INSERT INTO cars (make, model, year, nickname)
                        VALUES ('$new_make', '$new_model', '$new_year', '$new_nickname')";
    
    $db->query($insert_query);

    echo ("you did it");
}




?>