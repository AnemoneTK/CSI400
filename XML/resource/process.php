<?php
$file_students = "./xml/student.xml";
$file_cars = "./xml/car.xml";

if (isset($_POST['addStudent'])) {
    $txtID = $_POST['txtID'];
    $txtName = $_POST['txtName'];
    $txtMajor = $_POST['txtMajor'];

    if($txtID != '' && $txtName != '' && $txtMajor !=''){
        $fp = fopen($file_students, "rb") or die("cannot open file");
        $str = fread($fp, filesize($file_students));
        $xml = new DOMDocument();

        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xml->loadXML($str) or die("Error");
        $root = $xml->documentElement;
    
        //Find last Attribute
        $findLast = simplexml_load_file($file_students);
        $last = $findLast->xpath("//Student[last()]");
        $numLast = $last[0]["No"];
    
        $ID = $xml->createElement("ID", $txtID);
        $Name = $xml->createElement("Name", $txtName);
        $Major = $xml->createElement("Major", $txtMajor);
    
        $student = $xml->createElement("Student");
        //add Attribute
        $Attr = $xml->createAttribute("No");
        $Attr->value = $numLast + 1;
        $student->appendChild($Attr);
    
        $student->appendChild($ID);
        $student->appendChild($Name);
        $student->appendChild($Major);
    
        $root->appendChild($student);
    
        $xml->save($file_students);
    }
}
if (isset($_POST['addCar'])) {
    $txtBrand = $_POST['txtBrand'];
    $txtColor = $_POST['txtColor'];
    $txtPrice = $_POST['txtPrice'];
    if($txtBrand != '' && $txtColor != '' && $txtPrice !=''){
        $fp = fopen($file_cars, "rb") or die("cannot open file");
        $str = fread($fp, filesize($file_cars));
        $xml = new DOMDocument();

        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xml->loadXML($str) or die("Error");
        $root = $xml->documentElement;
    
        //Find last Attribute
        $findLast = simplexml_load_file($file_cars);
        $last = $findLast->xpath("//Car[last()]");
        $numLast = $last[0]["No"];
    
        $Brand = $xml->createElement("Brand", $txtBrand);
        $Color = $xml->createElement("Color", $txtColor);
        $Price = $xml->createElement("Price", $txtPrice);
    
        $car = $xml->createElement("Car");
        //add Attribute
        $Attr = $xml->createAttribute("No");
        $Attr->value = $numLast + 1;
        $car->appendChild($Attr);
    
        $car->appendChild($Brand);
        $car->appendChild($Color);
        $car->appendChild($Price);

        $root->appendChild($car);
    
        $xml->save($file_cars);
    }
}
header(("Location: ../index.php"));
?>