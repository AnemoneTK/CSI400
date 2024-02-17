
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./resource/css/table.css">
</head>
<body>
    <div id="BG" class="col-12 d-flex flex-row  align-items-start bg-dark m-0" style="height: 100dvh;">
        <div class="col-6 d-flex flex-column  border-end" style="height: 100dvh;">
            <form method="POST" action="./resource/process.php" class="col-12 d-flex flex-column justify-content-center align-items-center mt-4" >
                <h1 class="text-white">STUDENTS FORM</h1>
                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Student ID :</p>
                    <input id="txtAddress" type="text" name="txtID" class="form-control mx-3 col-12" required>
                </div>
                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Name :</p>
                    <input id="txtAddress" type="text" name="txtName" class="form-control mx-3 col-12" required>
                </div>
                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Major :</p>
                    <select id="txtMajor" name="txtMajor" class="form-select mx-3 col-12" required>
                        <option value="" selected>Select Major</option>
                        <option value="CSI">CSI</option>
                        <option value="CPE">CSP</option>
                        <option value="ICT">ICT</option>
                        <option value="Other">Other</option>
                       
                    </select>
                </div>
                <div class="col-12 d-flex flex-row justify-content-center align-items-center mt-4 ">
                    <button class="btn btn-success btn-lg fw-bold mt-3 mx-1 col-4" name="addStudent">Add Student</button>
                </div>
            </form>
            <div class="mx-5 mt-5 d-flex table-wrapper-scroll-y my-custom-scrollbar ">
                <table class="table table-bordered table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Major</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $xml = simplexml_load_file('./resource/xml/student.xml');
                            foreach($xml as $element){?>
                            <tr>
                                <td><?php echo $element['No']?></td>
                                <td><?php echo $element -> ID?></td>
                                <td><?php echo $element -> Name?></td>
                                <td><?php echo $element -> Major?></td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>

            </div>
        </div>


        <div class="col-6 d-flex flex-column border-start" style="height: 100dvh;">
            <form method="POST" action="./resource/process.php" class="col-12 d-flex flex-column justify-content-center align-items-center mt-4 " >
            <h1 class="text-white">CARS FORM</h1>

                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Brand :</p>
                    <select id="txtBrand" name="txtBrand" class="form-select mx-3 col-12" required>
                        <option value="" selected>Select Brand</option>
                        <option value="Tesla">Tesla</option>
                        <option value="BMW">BMW</option>
                        <option value="Benz">Benz</option>
                        <option value="Ford">Ford</option>
                        <option value="Honda">Honda</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Color :</p>
                    <input id="txtColor" type="text" name="txtColor" class="form-control mx-3 col-12" required>
                </div>
                <div class="row col-10 d-flex  my-2">
                    <p class="m-0 w-40 font-weight-bold fs-5 text-light mb-1">Price :</p>
                    <input id="txtPrice" type="number" name="txtPrice" class="form-control mx-3 col-12" required>
                </div>
                <div class="row col-10 d-flex flex-row justify-content-center align-items-center mt-4">
                    <button class="btn btn-success btn-lg fw-bold mt-3 mx-1 col-5" name="addCar">Add Car</button>
                </div>
            </form>

            <div class="mx-5 mt-5 d-flex table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Color</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $xml = simplexml_load_file('./resource/xml/car.xml');
                            foreach($xml as $element){?>
                            <tr>
                                <td><?php echo $element['No']?></td>
                                <td><?php echo $element -> Brand?></td>
                                <td><?php echo $element -> Color?></td>
                                <td><?php echo $element -> Price?></td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>

            </div>
        </div>
</div>
</body>
<script>
$(document).ready(function() {
    $txtBrand = '';
    $txtColor = '';
    $txtPrice = '';

    $txtID = '';
    $txtName = '';
    $txtMajor = '';
});
</script>
</html>
