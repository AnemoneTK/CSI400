<?php
$file = "Students.xml";

$txtID = $_POST['txtID'];
$txtName = $_POST['txtName'];
$txtMajor = $_POST['txtMajor'];

if(isset($_POST['add'])){
    $fp = fopen($file, "rb") or die ("cannot open file");
    $str = fread($fp, filesize($file));
    $xml = new DOMDocument();
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;
    $xml->loadXML($str) or die("Error");
    echo "<xml>OLD:\n".$xml->saveXML()."</xml>";
    $root = $xml->documentElement;

    //Find last Attribute
    $findlast = simplexml_load_file($file);
    $last = $findlast-> xpath("//Student[last()]");
    $numLast = $last[0]["No"];

    $ID = $xml->createElement("ID", $txtID);
    $Name = $xml->createElement("Name", $txtName);
    $Major = $xml->createElement("Major", $txtMajor);

    $student = $xml->createElement("Student");
    //add Attribute
    $Attr = $xml->createAttribute("No");
    $Attr->value = $numLast + 1 ;
    $student->appendChild($Attr);
    
    $student->appendChild($ID);
    $student->appendChild($Name);
    $student->appendChild($Major);

    $root->appendChild($student);

    $xml->save($file);
}else{
// Display 
$xml = simplexml_load_file('./Students.xml');
foreach($xml as $element){
   echo $element['No']."<br>";
   echo $element -> ID."<br>";
   echo $element -> Name."<br>";
   echo $element -> Major."<br>";
   echo "<br>";
}
}


?>