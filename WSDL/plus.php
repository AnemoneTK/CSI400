<?php
	$number1=$_POST['number1'];
	$number2=$_POST['number2'];
  	$client = new SoapClient("http://localhost/CSI400/WSDL/server/calculate.wsdl");
  	if(isset($_POST['Plus'])){
		$result = $client->plus($number1,$number2);
		echo $number1."+".$number2."=".$result;
	}
  	if(isset($_POST['Minus'])){
		$result = $client->minus($number1,$number2);
		echo $number1."-".$number2."=".$result;
	}
  	if(isset($_POST['Multiple'])){
		$result = $client->multiple($number1,$number2);
		echo $number1."x".$number2."=".$result;
	}
  	if(isset($_POST['Divide'])){
		$result = $client->divide($number1,$number2);
		echo $number1."/".$number2."=".$result;
	}
?>
