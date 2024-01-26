<?php
    $serverName = "localhost\\";
    // $connectioninfo = array("Database"=>"5-903-11\LAB5SQL2019\CSI206_65039089C", "UID"=>"sa", "PWD"=>"123456789");
    $connectioninfo = array("Database"=>"CSI206_65039089C", "UID"=>"sa", "PWD"=>"123456789");
    $conn = sqlsrv_connect($serverName, $connectioninfo);

    if($conn){
        echo("Connected<br>");
    }else{
        echo("Connect False<br>");
        die.(print_r(sqlsrv_errors(), true));
    }
?>

