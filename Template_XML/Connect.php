<?php
// Connect MSSQL Server
$serverName = "localhost\LAB5SQL2019";
$connectioninfo = array("Database"=>"CSI206_65039089E", "UID"=>"sa", "PWD"=>"123456789");
$conn = sqlsrv_connect($serverName, $connectioninfo);

// Connect MySQL
// $host = "localhost";
// $user = "root";
// $password = "root";
// $dbname = "CSI400";
// $linked = mysqli_connect($host,$user,$password,$dbname);

?>