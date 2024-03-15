<?php
include_once('./configDB.php');

$db = new database();
$db->empno = isset($_GET['empno']) ? $_GET['empno'] : die();
echo json_encode($db->delete());
?>