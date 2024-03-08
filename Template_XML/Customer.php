<?php
	$id = $_POST['id'];
	$client = new SoapClient("http://localhost/CSI400_65039089/Template_XML/Customer.wsdl");
	// $client = new SoapClient("http://localhost/CSI400/Template_XML/Customer.wsdl");

	if($_POST['Submit']=="Find"){
		$xml = $client->findXML($id);  // Call the SOAP function and pass
		if($xml!=''){
			print $xml->cID."<br>";
			print $xml->cName."<br>";
			print $xml->cTel."<br>";
		}
		else
			print "No data";
	}
	if($_POST['Submit']=="Show All"){
		$result = $client->requestXML();
		$xml = simplexml_load_string($result);
		foreach($xml->children() as $child)
		{
		echo $child->getName() . ": " . $child. "<br>";
		foreach($child->children() as $element)
		{
			echo $element->getName() . ": " . $element. "<br>";
		}
		}

	}	

	if($_POST['Submit'] == "ShowEMP"){
		$result = $client->ShowEMP();
		print var_dump($result);
	}
	if($_POST['Submit'] == "AddEMP"){
		include("Connect.php");
		// $sql = "insert into EMP(empno,ename) values('".$empno."', '".$ename."')";
		$sql = "insert into EMP(empno,ename) values('222', '222')";
		$result = sqlsrv_query($conn, $sql);
	}
	if($_POST['Submit'] == "DeleteEMP"){
		include("Connect.php");
		$sql = "Delete EMP where empno = '222'";
		$result = sqlsrv_query($conn, $sql);
	}
?>