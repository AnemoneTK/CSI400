<?php

    function plus($num3,$num4) {
    	return $num3+$num4; 
    }
    function minus($num3,$num4) {
    	return $num3-$num4; 
    }
    
    $server = new SoapServer("plus.wsdl");
    
    $server->addFunction("plus");
    $server->addFunction("minus");
    
    $server->handle();
    
?>