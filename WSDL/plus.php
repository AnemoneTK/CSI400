<?php
	$number1=$_POST['number1'];
	$number2=$_POST['number2'];
  	$client = new SoapClient("plus.wsdl");
  	if(isset($_POST['Plus'])){
		$result = $client->plus($number1,$number2);
		echo $number1."+".$number2."=".$result;

	}
  	if(isset($_POST['Minus'])){
		$result = $client->minus($number1,$number2);
		echo $number1."-".$number2."=".$result;

	}
?>