<?php
$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// $conn-> executeQuery(); //read
// $conn-> BulkWrite(); //insert update delete
$empno = $_POST['empno'];
$ename = $_POST['ename'];
if(!$conn){
    echo "Connect Error";
}else{

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;600&family=Prompt:wght@100;300;400;700&display=swap');
        tbody {
        display: block;
        height: 200px;
        overflow: auto;
    }

    thead,
    tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }
    </style>
</head>
<body style="font-family: 'Prompt', sans-serif;">
    <div class="warper bg-dark d-flex flex-column align-items-center justify-content-around p-5 " style="height: 100dvh;">
        <div class="row col-12 d-flex align-items-center">
            <h1 class="text-center fw-bolder text-white mb-5">ข้อมูลพนักงาน</h1>
        </div>
        <form method="POST" class="col-8 h-auto d-flex flex-column align-items-center justify-content-center">
            <div class="row col-5 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 mb-2">
                    <div class="col-3 text-white text-end me-3">รหัสพนักงาน :</div>
                    <input type="text" name="empno" id="empno" class="form-control-lg col" placeholder="รหัสพนักงาน">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 mb-2">
                    <div class="col-3 text-white text-end me-3">ชื่อพนักงาน :</div>
                    <input type="text" name="ename" id="ename" class="form-control-lg col" placeholder="ชื่อพนักงาน">
                </div>
            </div>
           <div class="row col-8 mt-4 d-flex flex-row align-items-center justify-content-center ">
             
            <button type="submit" class="btn btn-warning col-2 rounded-0" name="search">
                <i class="bi bi-search me-3"></i>Search
            </button>
            <button type="submit" class="btn btn-success col-2 rounded-0" name="add">
                <i class="bi bi-plus-circle me-3"></i>Add
            </button>
            <button type="submit" class="btn btn-info col-2 rounded-0" name="update">
                <i class="bi bi-file-earmark-arrow-up me-3"></i>Update
            </button>
            <button type="submit" class="btn btn-danger col-2 rounded-0" name="delete">
                <i class="bi bi-trash me-3"></i>Delete
            </button>
           </div>
        </form>
        <div class="row col-4 border border-2 rounded-1 bg-white mt-3 d-flex align-items-center justify-content-center p-0" style="min-height: 300px;">
               <?php 
                if(isset($_POST['search'])){
                    if($empno == ""){
                        $query = new MongoDB\Driver\Query([]);
                    }else{
                        $query = new MongoDB\Driver\Query(["empno"=>$empno]);
                    }

                    $result =$conn->executeQuery("CSI206Lab.EMP",$query); ?>
                    <table class="table table-striped m-0 p-0">
                    <thead class="fs-4">
                        <tr>
                            <th class="col-6">รหัสพนักงาน</th>
                            <th class="col-6">ชื่อพนักงาน</th>
                        </tr>
                    </thead>
                    <tbody class="fs-5">
                        <?php 
                            foreach ($result as $row) {
                        ?>
                        <tr>
                            <td class="col-6"><?php echo $row->empno; ?></td>
                            <td class="col-6"><?php echo $row->ename;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    <?php }
                if(isset($_POST['add'])){
                    if($empno=="" || $ename==""){ ?>
                        <div class="text-center fs-2 text-danger">กรุณากรอกข้อมูลพนักงานให้ครบถ้วน</div>
                    <?php }else{
                        $bulk = new MongoDB\Driver\BulkWrite;
                        $bulk->insert(['empno'=>$empno, 'ename'=>$ename]);
                        $result = $conn->executeBulkWrite("CSI206Lab.EMP",$bulk);
                        if(!$result){?>
                            <div class="text-center fs-2 text-danger">ไม่สามารถเพิ่มได้</div>
                        <?php }else{ ?>
                            <div class="text-center fs-2 text-success">เพิ่มข้อมูลพนักงาน <?php echo $ename?> เรียบร้อยแล้ว</div>
                      <?php  }
                    }
                }
                if(isset($_POST['update'])){
                    if($empno==""){ ?>
                        <div class="text-center fs-2 text-danger">กรุณากรอกข้อมูลรหัสพนักงาน</div>
                    <?php }else{
                        $bulk = new MongoDB\Driver\BulkWrite;
                        $bulk->update(
                            //find document
                            ["empno"=>$empno],
                            //set new value
                            ['$set'=>['ename'=>$ename]],
                            //optional
                            ['multi'=>false, 'upsert'=> true]
                        );
                        $result = $conn->executeBulkWrite("CSI206Lab.EMP",$bulk);
                        if(!$result){?>
                            <div class="text-center fs-2 text-danger">ไม่สามารถแก้ไขได้</div>
                        <?php }else{ ?>
                            <div class="text-center fs-2  text-success">แก้ไขข้อมูลพนักงาน <?php echo $empno?> เรียบร้อยแล้ว</div>
                      <?php  }
                    }
                }
                if(isset($_POST['delete'])){
                    if($empno==""){ ?>
                        <div class="text-center fs-2 text-danger">กรุณากรอกข้อมูลรหัสพนักงาน</div>
                    <?php }else{
                        $bulk = new MongoDB\Driver\BulkWrite;
                        $bulk->delete(
                            ["empno"=>$empno],
                            //เจอตัวแรกแล้วหยุดเลย กรณีมีรหัสซ้ำกัน
                            ['limit'=>1]
                        );
                        $result = $conn->executeBulkWrite("CSI206Lab.EMP",$bulk);
                        if(!$result){?>
                            <div class="text-center fs-2 text-danger">ไม่สามารถลบได้</div>
                        <?php }else{ ?>
                            <div class="text-center fs-2  text-success">ลบข้อมูลพนักงาน <?php echo $empno?> เรียบร้อยแล้ว</div>
                      <?php  }
                    }
                }
               ?>
        
       
        </div>
        <div class="row d-flex flex-column align-items-center justify-content-center mt-5">
            <div class="text-white text-center fs-4 mb-3">
                จัดทำโดย
            </div>
            <h1 class="text-white">
                65039089 นางสาวนริศรา จ่างสะเดา
            </h1>
        </div>
    </div>

</body>
</html>

