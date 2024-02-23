<?php
	$number1=$_POST['number1'];
	$number2=$_POST['number2'];
  	$client = new SoapClient("http://localhost/CSI400_65039089/WSDL/server/plus.wsdl");
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

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100dvh; width: 100dvw; background-color: #1f1f1f;">
        
</div>