<?php
include_once('./configDB.php');

$db = new database();
$db->empno = isset($_GET['empno']) ? $_GET['empno'] : die();
$db->ename = isset($_GET['ename']) ? $_GET['ename'] : die();
$db->sal = isset($_GET['sal']) ? $_GET['sal'] : die();
echo json_encode($db->update());
?>