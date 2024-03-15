<?php
//Connet DB
function addEMP($empno, $ename)
{
	include 'Connect.php';
    if ($conn) {
        $sql = "insert into EMP(empno,ename) values('" . $empno . "', '" . $ename . "')";
        $result = $conn->query($conn, $sql);
		if ($result) {
			return true;
        } else {
			return false;
        }
    } else {
        echo "Can not Connect";
    }
}

function deleteEMP($empno)
{
    include 'Connect.php';
    if ($conn) {
        $sql = "Delete from EMP where empno = '" . $empno . "' ";
        $result = sqlsrv_query($conn, $sql);
        if ($result) {
			return true;
        } else {
			return false;
        }
    } else {
        echo "Can not Connect";
    }

}

function ShowEMP()
{
    include 'Connect.php';
    if ($conn) {
        // $sql = "select * from EMP";
        // $result = $conn->query($conn, $sql);
        // // $str = [];
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo "id: " . $row["empno"]. "<br>";
        // }
        // // return json_encode($str);
        return true
    } else {
        return false;
        echo "Can not Connect";
    }
}

// Use File Customer.xml
function findXML($para)
{
    $xml = simplexml_load_file("Customer.xml");
    foreach ($xml->children() as $child) {
        foreach ($child->children() as $data) {
            if ($data == $para) {
                return $child;
            }

        }
    }
    return "";
}
function requestXML()
{
    $xmlObject = simplexml_load_file("Customer.xml");
    $xml = new DOMDocument();
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = false;
    $xml->loadXML($xmlObject->asXML()) or die("Error");
    return $xml->saveXML();

}

// $server = new SoapServer("http://localhost/CSI400_65039089/Template_XML/Customer.wsdl");
$server = new SoapServer("http://localhost/CSI400/Template_XML/Customer.wsdl");
$server->addFunction("findXML"); // Add Function to Server
$server->addFunction("requestXML");
$server->addFunction("ShowEMP");
$server->addFunction("deleteEMP");
$server->addFunction("addEMP");

$server->handle();
