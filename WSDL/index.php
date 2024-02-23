<?php
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];
$client = new SoapClient("http://localhost/CSI400/WSDL/server/calculate.wsdl");
if (isset($_POST['Plus'])) {
    $type = "+";
    $result = $client->plus($number1, $number2);} else if (isset($_POST['Minus'])) {
    $type = "-";
    $result = $client->minus($number1, $number2);} else if (isset($_POST['Multiple'])) {
    $type = "x";
    $result = $client->multiple($number1, $number2);} else if (isset($_POST['Divide'])) {
    $type = "/";
    $result = $client->divide($number1, $number2);
    $result = round($result, 2);
} else {
    $type = "";
}

if (isset($_POST['Clear'])) {
    $number1 = '';
    $number2 = '';
}
?>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<html lang="en">

<head>
    <title>65039089 นริศรา จ่างสะเดา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100dvh; width: 100dvw; background-color: #1f1f1f;">
        <div class="row col-5 ">
        <form action="" method="POST"
            class="d-flex flex-column justify-content-center align-items-center">
            <div class="text-white tex-center text-warp fw-bolder fs-2">ตัวอย่างการเรียกใช้งานเว็บเซอร์วิสบวกเลข</div>

            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-2">
                     <input class="form-control form-control-lg fw-bolder text-center fs-1" type="text" name="number1" required
                     value="<?php echo $number1 ?>"
                     ></input>
                </div>
                <div class="col-1">
                     <div class="fs-1 form-control text-white d-flex justify-content-center align-items-center bg-transparent border border-0"> <?php echo $type; ?> </div>
                </div>
                <div class="col-2">
                     <input class="form-control form-control-lg fw-bolder text-center fs-1" type="text" name="number2" require
                     value="<?php echo $number2 ?>"
                     ></input>
                </div>
                <div class="col-1">
                     <div class="fs-1 form-control text-white d-flex justify-content-center align-items-center bg-transparent border border-0">=</div>
                </div>
                <div class="col-3">
                     <input class="form-control form-control-lg fw-bolder text-center bg-transparent border border-0 text-white fs-1" type="text" name="number2" disabled value="<?php echo $result ?>">
                    </input>
                </div>
            </div>


            <div class="row col-12">
                <input class="col form-control btn btn-success mx-2 btn-lg" type="submit" name="Plus" value="Plus"></input>
                <input class="col form-control btn btn-danger mx-2 btn-lg" type="submit" name="Minus" value="Minus"></input>
                <input class="col form-control btn btn-primary mx-2 btn-lg" type="submit" name="Multiple" value="Multiple"></input>
                <input class="col form-control btn btn-warning mx-2 btn-lg" type="submit" name="Divide" value="Divide"></input>
            </div>
            <div class="row col-12 mt-3">
                <input class="col form-control btn btn-secondary mx-2 btn-lg" type="submit" name="Clear" value="Clear"></input>
            </div>
        </form>
        </div>
        <div class="row col-8 mt-5 ">
            <div class="col-12 text-white fs-5 d-flex flex-column justify-content-center align-items-center">จัดทำโดย</div>
            <div class="col-12 text-white fs-4 d-flex flex-column justify-content-center align-items-center">65039089 นางสาวนริศรา จ่างสะเดา</div>
        </div>
    </div>
</body>

</html>

