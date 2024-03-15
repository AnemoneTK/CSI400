<?php
include_once('./configDB.php');
$db = new database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest API | mySQL Connect</title>

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
                <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0">
                    <div class="col-3 text-white text-end me-3">รหัสพนักงาน :</div>
                    <input type="text" name="empno" id="empno" class="form-control-lg col" placeholder="รหัสพนักงาน">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 my-3">
                    <div class="col-3 text-white text-end me-3">ชื่อพนักงาน :</div>
                    <input type="text" name="ename" id="ename" class="form-control-lg col" placeholder="ชื่อพนักงาน">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0">
                    <div class="col-3 text-white text-end me-3">เงินเดือน :</div>
                    <input type="text" name="sal" id="sal" class="form-control-lg col" placeholder="เงินเดือน">
                </div>
            </div>
           <div class="row col-8 mt-4 d-flex flex-row align-items-center justify-content-center ">
             <button type="submit" class="btn btn-success col-2 rounded-0" name="Insert">
                <i class="bi bi-plus-circle me-3"></i>Add new
            </button>
             <button type="submit" class="btn btn-primary col-2 rounded-0" name="Update">
                <i class="bi bi-file-earmark-arrow-up me-3"></i>Update
            </button>
            <button type="submit" class="btn btn-info col-2 rounded-0" name="ShowAll">
                <i class="bi bi-eye me-3"></i>Show All
            </button>
            <button type="submit" class="btn btn-warning col-2 rounded-0" name="Search">
                <i class="bi bi-search me-3"></i>Search ID
            </button>
            <button type="submit" class="btn btn-danger col-2 rounded-0" name="Delete">
                <i class="bi bi-trash me-3"></i>Delete
            </button>
           </div>
        </form>
        <div class="row col-6 border border-2 rounded-1 bg-white mt-3 d-flex align-items-center justify-content-center p-0" style="min-height: 300px;">
               <?php 
               if(isset($_POST['ShowAll'])){
                    $emp = ($db->showAll());
                ?>
                <table class="table table-striped m-0 p-0">
                    <thead class="fs-4">
                        <tr>
                            <th class="col-3">รหัสพนักงาน</th>
                            <th class="col">ชื่อพนักงาน</th>
                            <th class="col-3">เงินเดือน</th>
                        </tr>
                    </thead>
                    <tbody class="fs-5">
                        <?php 
                            foreach ($emp as $item) {
                        ?>
                        <tr>
                            <td class="col-3"><?php echo $item['empno']?></td>
                            <td class="col"><?php echo $item['ename']?></td>
                            <td class="col-3 text-start"><?php echo $item['sal']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
               <?php } 
               if(isset($_POST['Search'])){
                $empno = $_POST['empno'];
                
                if($empno == ""){ ?>
                    <div class="text-center fs-1 text-danger">กรุณากรอกรหัสพนักงาน</div>
                <?php }else{
                    $db->empno = $empno;
                    $result = ($db->search());
                    if($result == []){ ?>
                        <div class="text-center fs-1 text-danger">ไม่พบข้อมูลพนักงานหมายเลข <?php echo $empno;?></div>
                    <?php } else{
                        foreach ($result as $item) { ?> 
                        <div class="row col-12 d-flex flex-column align-items-center justify-content-center fs-2">
                            <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 ">
                                <div class="col text-end me-3">รหัสพนักงาน :</div>
                                <div class="col text-start fw-bold"><?php echo $item["empno"];?></div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 my-2">
                                <div class="col text-end me-3">ชื่อพนักงาน :</div>
                                <div class="col text-start fw-bold"><?php echo $item["ename"];?></div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-center col-12 p-0 ">
                                <div class="col text-end me-3">เงินเดือน :</div>
                                <div class="col text-start fw-bold"><?php echo $item["sal"];?> บาท</div>
                            </div>
                        </div>
                        <?php }
                    }
                }
               }

               if(isset($_POST['Insert'])){
                $empno = $_POST['empno'];
                $ename = $_POST['ename'];
                $sal = $_POST['sal'];
                
                if($empno == "" || $ename == "" || $sal == ""){ ?>
                    <div class="text-center fs-2 text-danger">กรุณากรอกข้อมูลพนักงานให้ครบถ้วน</div>
                <?php }else{
                    $db->empno = $empno;
                    $db->ename = $ename;
                    $db->sal = $sal;
                  
                    $check = ($db->search());
                    if($check != []){ ?>
                        <div class="text-center fs-2 text-danger">มีข้อมูลพนักงานหมายเลข <?php echo $empno;?> อยู่แล้ว</div>
                    <?php } else{
                        $result = ($db->insert());
                    ?>
                            <div class="text-center fs-2 text-danger">เพิ่มข้อมูลพนักงาน <?php echo $empno;?> เรียบร้อยแล้ว</div>
                    <?php }
                    }
                    }

               if(isset($_POST['Update'])){
                $empno = $_POST['empno'];
                $ename = $_POST['ename'];
                $sal = $_POST['sal'];
                
                if($empno == "" || $ename == "" || $sal == ""){ ?>
                    <div class="text-center fs-2 text-danger">กรุณากรอกข้อมูลพนักงานให้ครบถ้วน</div>
                <?php }else{
                    $db->empno = $empno;
                    $db->ename = $ename;
                    $db->sal = $sal;
                  
                    $check = ($db->search());
                    if($check == []){ ?>
                        <div class="text-center fs-2 text-danger">ไม่พบข้อมูลพนักงานหมายเลข <?php echo $empno;?></div>
                    <?php } else{
                        $result = ($db->update());
                    ?>
                            <div class="text-center fs-2 text-danger">อัปเดตข้อมูลพนักงาน <?php echo $empno;?> เรียบร้อยแล้ว</div>
                    <?php }
                    }
                    }
                
               if(isset($_POST['Delete'])){
                $empno = $_POST['empno'];
                
                if($empno == ""){ ?>
                    <div class="text-center fs-2 text-danger">กรุณากรอกรหัสพนักงานที่ต้องการลบข้อมูล</div>
                <?php }else{
                    $db->empno = $empno;
                    $check = ($db->search());
                    
                    if($check == []){ ?>
                        <div class="text-center fs-2 text-danger">ไม่พบข้อมูลพนักงานหมายเลข <?php echo $empno;?></div>
                    <?php } else{ 
                        $result = ($db->delete());
                    ?>
                        <div class="text-center fs-2 text-danger">ลบข้อมูลพนักงานหมายเลข <?php echo $empno;?> เรียบร้อยแล้ว</div>

                    <?php }
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