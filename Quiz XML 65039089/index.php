<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- jquery and sweet alert cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<head>
    <title>ข้อมูลลูกค้า</title>
</head>

<body style="font-family: 'Prompt', sans-serif;">
    <div class="warper h-100 bg-dark d-flex flex-column align-items-center justify-content-center p-5 ">
        <div class="row col-12 d-flex align-items-center">
            <h1 class="text-center fw-bolder text-white mb-5">ข้อมูลลูกค้า</h1>
        </div>

        <!-- Modal Add Customer -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bolder" id="exampleModalLabel">เพิ่มข้อมูลลูกค้า</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./insertCustomer.php" method="POST" class="col-12 h-auto d-flex flex-column align-items-center" id="addCustomer">
                            <div class="row col-10 fs-5">
                                Customer ID : <input type="text" name="txtID" class="form-control">
                            </div>
                            <div class="row col-10 my-3 fs-5">
                                Customer NAME : <input type="text" name="txtName" class="form-control">
                            </div>
                            <div class="row col-10 fs-5">
                                Customer TEL : <input type="text" name="txtTel" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="Insert">Insert</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <form method="POST" class="col-8 h-auto d-flex flex-column align-items-center justify-content-center">
            <div class="row col-5 d-flex flex-row align-items-center justify-content-center">
                <div class="row col-10 p-0 m-0">
                    <input type="text" name="findID" id="findID" class="form-control rounded-0" placeholder="Find by Customer ID">
                </div>
                <div class="row col-2 p-0 m-0 h-100">
                    <button type="submit" class="btn btn-primary rounded-0 h-100" name="Search"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        <form action="index.php" method="post" class="row col-5 d-flex align-items-center justify-content-center p-0 my-4">
            <button type="button" class="btn btn-success col-4 rounded-0 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle me-3"></i>Add new customer
            </button>
            <button type="submit" class="btn btn-info col-4 rounded-0 mx-1" name="showAll">
                <i class="bi bi-eye me-3"></i>Show all customer
            </button>
        </form>
        <div class="row col-6 border border-2 rounded-1 bg-white mt-3 d-flex align-items-center justify-content-center fs-2" style="min-height: 300px;">
            <?php

            if (isset($_POST['Search'])) {
                $ID = $_POST['findID'];
                $xml = new DOMDocument();
                $xml->load('Customer.xml');

                if($ID == ""){
                    echo"กรุณากรอกรหัสในช่องค้นหา";
                }else{
                    // Create XPath object
                $xpath = new DOMXPath($xml);

                // Search for the customer with ID
                $customer = $xpath->query("//Customer[cID=" . $ID . "]");

                // Check if the customer exists
                if ($customer->length > 0) {
                    // Get the first (and only) customer element
                    $customerElement = $customer->item(0);
            ?>
                    <div class="col-12 h-auto d-flex flex-column align-items-center">
                        <div class="row col-5 fs-5">
                            <div class="col-7">
                                Customer ID :
                            </div>
                            <?php echo $customerElement->getElementsByTagName("cID")->item(0)->nodeValue; ?>
                        </div>
                        <div class="row col-5 my-3 fs-5">
                            <div class="col-7">
                                Customer NAME :
                            </div>
                            <?php echo $customerElement->getElementsByTagName("cName")->item(0)->nodeValue; ?>
                        </div>
                        <div class="row col-5 fs-5">
                            <div class="col-7">
                                Customer TEL :
                            </div>
                            <?php echo $customerElement->getElementsByTagName("cTel")->item(0)->nodeValue; ?>
                        </div>
                    </div>
                <?php } else{
                    echo "ไม่พบข้อมูลลูกค้าที่มี ID : ".$ID;
                }
                }
            }
            else { ?>
                <table class="table table-striped m-0 p-0">
                    <thead>
                        <tr>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $xml = simplexml_load_file('./Customer.xml');
                        foreach ($xml as $element) { ?>
                            <tr>
                                <td><?php echo $element->cID ?></td>
                                <td><?php echo $element->cName ?></td>
                                <td><?php echo $element->cTel ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        <?php  } ?>

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

<script>
    $(document).ready(function() {
        $("#addCustomer").submit(function(e) {
            e.preventDefault();

            let formUrl = $(this).attr("action");
            let reqMethod = $(this).attr("method");
            let formData = $(this).serialize();
            $.ajax({
                url: formUrl,
                type: reqMethod,
                data: formData,
                success: function(data) {
                    let result = JSON.parse(data);
                    if (result.status == "success") {
                        Swal.fire({
                            position: 'center',
                            icon: result.status,
                            title: result.msg,
                            showConfirmButton: true,
                            // timer: 1500
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: result.status,
                            title: result.msg,
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                }
            })
        })
    })
</script>