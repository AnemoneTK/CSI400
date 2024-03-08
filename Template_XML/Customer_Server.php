<?php
	//Connet DB
	function addEMP($empno, $ename){
		$sql = "insert into EMP(empno,ename) values('".$empno."', '".$ename."')";
		$result = sqlsrv_query($conn, $sql);
		return $result;
	}
	function deleteEMP($empno, $ename){
		$sql = "insert into EMP(empno,ename) values('".$empno."', '".$ename."')";
		$result = sqlsrv_query($conn, $sql);
		return $result;
	}

	function ShowEMP(){
		include('Connect.php');
		if($conn){
			$sql = "select * from EMP";
			$result = sqlsrv_query($conn, $sql);
			$str = [];
			while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
				$str[] = $row;
			}
			return json_encode($str);
		}else{
			echo "Can not Connect";
		}
	}

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
    
    $server = new SoapServer("http://localhost/CSI400_65039089/Template_XML/Customer.wsdl");
    // $server = new SoapServer("http://localhost/CSI400/Template_XML/Customer.wsdl");
	$server->addFunction("findXML");  // Add Function to Server
	$server->addFunction("requestXML");
	$server->addFunction("ShowEMP");
	$server->addFunction("addEMP");
	
    
    $server->handle();    
?>