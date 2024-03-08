<?php
	// Use File Customer.xml
	function findXML($para){
		$xml = simplexml_load_file("Customer.xml");
		foreach($xml->children() as $child)
		{
			foreach($child->children() as $data)
			{
				if($data == $para)
					return $child;
			}
		}
		return "";
	}
	function requestXML(){
		$xmlObject=simplexml_load_file("Customer.xml");
		$xml = new DOMDocument();
		$xml->formatOutput = true;
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($xmlObject->asXML()) or die("Error");
		return $xml->saveXML();

	}
    
    $server = new SoapServer("http://localhost/CSI400/Template_XML/Customer.wsdl");
	$server->addFunction("findXML");  // Add Function to Server
	$server->addFunction("requestXML");
    
    $server->handle();    
?>