<?php
include_once('./configDB.php');

$db = new database();
$db->ename = isset($_GET['ename']) ? $_GET['ename'] : die();

echo json_encode($db->read_condition());

?>