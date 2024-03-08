<?php
	$id = $_POST['id'];
	$client = new SoapClient("http://localhost/CSI400/Template_XML/Customer.wsdl");

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
?>