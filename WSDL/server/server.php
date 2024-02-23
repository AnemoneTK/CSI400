<?php

    function plus($num3,$num4) {
    	return $num3+$num4; 
    }
    function minus($num3,$num4) {
    	return $num3-$num4; 
    }
    function multiple($num3,$num4) {
    	return $num3*$num4; 
    }
    function divide($num3,$num4) {
    	return $num3/$num4; 
    }
    
    $server = new SoapServer("http://localhost/CSI400/WSDL/server/calculate.wsdl");
    
    $server->addFunction("plus");
    $server->addFunction("minus");
    $server->addFunction("multiple");
    $server->addFunction("divide");
    
    $server->handle();
    
?>