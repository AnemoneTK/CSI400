<?php
    // คอมมอ 
    // $serverName = "localhost\LAB5SQL2019";

    // Computer
    $serverName = "DESKTOP-KSUDR89";
    $connectioninfo = array("Database"=>"CSI206_65039089C", "UID"=>"sa", "PWD"=>"123456789");
    $conn = sqlsrv_connect($serverName, $connectioninfo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="frame d-flex flex-column  align-items-center bg-dark m-0" style="width: 100dwh; height: 100dvh;">
        <form method="post" action="" class="w-40 h-20 d-flex flex-column justify-content-center align-items-center mt-4 mb-5" >
            <div class="d-flex w-100 justify-content-center align-items-center">
                <p class="m-0 w-40 font-weight-bold fs-5 text-light">Find Address from :</p>
                <input id="txtAddress" type="text" name="txtAddress" class="form-control w-50 mx-3">
            </div>
            <div class="d-flex flex-row w-100 justify-content-center align-items-center">
                <button class="btn btn-success btn-lg fw-bold mt-3 mx-1" name="showCustomer">Show All Customer</button>
                <button class="btn btn-warning btn-lg fw-bold mt-3 mx-1" name="cusBuyProduct">Customer Buy Product</button>
                <button class="btn btn-primary btn-lg fw-bold mt-3 mx-1" name="findAddress">Find From Address</button>
            </div>
        </form>
        <div class="showTable border rounded pt-3 px-3" style="width: auto; min-width: 30%;">
            <table class="table table-striped-columns w-100 ">

            <?php
            if($conn){
                if(isset($_POST['showCustomer'])){
                    $sql = "select * from Customer";
                    $result = sqlsrv_query($conn,$sql); ?>
                        <thead class="table-secondary">
                            <tr>
                                <td scope="col">รหัสลูกค้า</td>
                                <td scope="col">ชื่อลูกค้า</td>
                                <td scope="col">ที่อยู่</td>
                                <td scope="col">เบอร์โทรศัพท์</td>
                            </tr>
                        </thead>
                        <tbody class="table-dark">
                            <?php while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){?>
                            <tr>
                                <td scope="row"><?php echo($row['C_ID']);?></td>
                                <td><?php echo($row['C_NAME']);?></td>
                                <td><?php echo($row['C_ADDRESS']);?></td>
                                <td><?php echo($row['C_TEL']);?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                <?php }

                if(isset($_POST['cusBuyProduct'])){
                    $sql = "select c.C_ID,c.C_NAME,P_NAME
                    from CUSTOMER c, PRODUCT p, ORDERED o, ORDER_DETAIL od
                    where  c.C_ID = o.C_ID and o.ORDER_ID = od.ORDER_ID and od.P_ID = p.P_ID
                    order by c.C_ID";
                    $result = sqlsrv_query($conn,$sql); ?>
                        <thead class="table-secondary">
                            <tr>
                                <td scope="col">รหัสลูกค้า</td>
                                <td scope="col">ชื่อลูกค้า</td>
                                <td scope="col">สินค้าที่สั่งซื้อ</td>
                            </tr>
                        </thead>
                        <tbody class="table-dark">
                            <?php while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){?>
                            <tr>
                                <td scope="row"><?php echo($row['C_ID']);?></td>
                                <td><?php echo($row['C_NAME']);?></td>
                                <td><?php echo($row['P_NAME']);?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                <?php }

                if(isset($_POST['findAddress'])){
                    $address = $_POST['txtAddress'];
                    if($address){
                        $sql = "select * from Customer where C_ADDRESS = '".$address."'";
                        $result = sqlsrv_query($conn,$sql); 
                        ?>
                            <thead class="table-secondary">
                                <tr>
                                    <td scope="col">รหัสลูกค้า</td>
                                    <td scope="col">ชื่อลูกค้า</td>
                                    <td scope="col">ที่อยู่</td>
                                    <td scope="col">เบอร์โทรศัพท์</td>
                                </tr>
                            </thead>
                            <tbody class="table-dark">
                                <?php while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){?>
                                <tr>
                                    <td scope="row"><?php echo($row['C_ID']);?></td>
                                    <td><?php echo($row['C_NAME']);?></td>
                                    <td><?php echo($row['C_ADDRESS']);?></td>
                                    <td><?php echo($row['C_TEL']);?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    <?php }
                    else{ ?>
                        <p class="text-center fs-3 text-light">กรุณากรอกชื่อเมืองเพื่อค้นหา</p>
                   <?php }
                    }
            }else{
                echo("Connect False<br>");
                die.(print_r(sqlsrv_errors(), true));
            }
            ?>
            </table>
        </div>
    </div>
</body>
</html>