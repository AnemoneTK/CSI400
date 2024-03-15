<?php
// Connect MSSQL Server

// $serverName = "DESKTOP-KSUDR89";
// //คอม มอ
// // $serverName = "localhost\LAB5SQL2019"; 
// $connectioninfo = array("Database"=>"CSI206_65039089E", "UID"=>"sa", "PWD"=>"123456789");
// $conn = sqlsrv_connect($serverName, $connectioninfo);

// Connect MySQL
$host = "localhost";
// $port = "3306";
$user = "root";
$password = "root";
$dbname = "CSI400";

$conn = new mysqli($host,$user,$password,$dbname);
// $conn = mysqli_connect($host, $port, $user,$password,$dbname);

?>