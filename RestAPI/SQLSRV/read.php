<?php
include_once('./configDB.php');

$db = new database();
echo json_encode($db->read());

?>