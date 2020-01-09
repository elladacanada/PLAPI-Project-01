<?php
require_once("../conn.php");

$id = $_POST["id"];

$delete_query = " DELETE FROM cars WHERE id =". $id;

$db->query($delete_query);

?>