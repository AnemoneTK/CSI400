<?php
    $serverName = "localhost\LAB5SQL2019";
    // $connectioninfo = array("Database"=>"5-903-11\LAB5SQL2019\CSI206_65039089C", "UID"=>"sa", "PWD"=>"123456789");
    $connectioninfo = array("Database"=>"CSI206_65039089C", "UID"=>"sa", "PWD"=>"123456789");
    $conn = sqlsrv_connect($serverName, $connectioninfo);

    $address = $_POST['txtAddress'];

    
    if($conn){
        echo("Connected<br>");
        if(isset($_POST['showCustomer'])){
            $sql = "select * from Customer";
            $result = sqlsrv_query($conn,$sql);
        }
        if(isset($_POST['findAddress'])){
            $sql = "select * from Customer where C_ADDRESS = '".$address."'";
            $result = sqlsrv_query($conn,$sql);
        }
        if(isset($_POST['cusBuyProduct'])){
            $sql = "select
            c.C_ID,P_NAME
            from CUSTOMER c, PRODUCT p, ORDERED o, ORDER_DETAIL od
            where  c.C_ID = o.C_ID and o.ORDER_ID = od.ORDER_ID and od.P_ID = p.P_ID";
            $result = sqlsrv_query($conn,$sql);

            echo ("<table border =1>");
            echo ("<tr>".
                    "<td>รหัสลูกค้า</td>".
                    "<td>สินค้า</td>".
                "</tr>");
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                echo ("<tr>".
                    "<td>".$row['C_ID']."</td>".
                    "<td>".$row['P_NAME']."</td>".
                "</tr>");

            }
            echo ("</table>");
        }

        if($result === false){
            die(print_r(sqlsrv_errors(),true));
        }else{
            echo ("<table border =1>");
            echo ("<tr>".
                    "<td>รหัสลูกค้า</td>".
                    "<td>ชื่อ</td>".
                    "<td>ที่อยู่</td>".
                "</tr>");
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                echo ("<tr>".
                    "<td>".$row['C_ID']."</td>".
                    "<td>".$row['C_NAME']."</td>".
                    "<td>".$row['C_ADDRESS']."</td>".
                "</tr>");

            }
            echo ("</table>");
        }

    }else{
        echo("Connect False<br>");
        die.(print_r(sqlsrv_errors(), true));
    }
?>

