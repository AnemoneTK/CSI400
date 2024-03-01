<?php
$file_customer = "./Customer.xml";

    $txtID = $_POST['txtID'];
    $txtName = $_POST['txtName'];
    $txtTel = $_POST['txtTel'];

    if($txtID != '' && $txtName != '' && $txtTel !=''){
        $fp = fopen($file_customer, "rb") or die("cannot open file");
        $str = fread($fp, filesize($file_customer));
        $xml = new DOMDocument();

        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xml->loadXML($str) or die("Error");
        $root = $xml->documentElement;
    
        $ID = $xml->createElement("cID", $txtID);
        $Name = $xml->createElement("cName", $txtName);
        $Tel = $xml->createElement("cTel", $txtTel);
    
        $customer = $xml->createElement("Customer");
    
        $customer->appendChild($ID);
        $customer->appendChild($Name);
        $customer->appendChild($Tel);
    
        $root->appendChild($customer);
    
        $xml->save($file_customer);

        echo json_encode(array("status" => "success", "msg" => "Insert Complete"));
    }
    else{
        echo json_encode(array("status" => "warning", "msg" => "กรุณากรอกข้อมูลให้ครบถ้วน"));
    }
?>