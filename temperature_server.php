<!--
Simple Temperature conversion SOAP web service Server converts Degress Celsius to Fahrenheit and vice versa - Junior Php Developer Portfolio
Author: Thulasizwe Magagula
Purpose: Web Services - Simple Temperature conversion SOAP web service Server converts Degress Celsius to Fahrenheit and vice versa
Demonstrates working with php, SOAP web Services, HTML
-->
<?php

// Turn off WSDL caching
ini_set("soap.wsdl_cache_enabled", "0");

// Definition of the celciusToFahrenheit function
function celciusToFahrenheit($user_celcius) {
    return 32 + (($user_celcius * 9) / 5);
}

// Definition of the fahrenheitToCelcius function
function fahrenheitToCelcius($user_fahrenheit) {
    return ((($user_fahrenheit - 32) * 5) / 9);
}

// Initialize SOAP Server
$server = new SoapServer("temparature_wsdl.wsdl");

// Register available functions
$server->addFunction('celciusToFahrenheit');
$server->addFunction('fahrenheitToCelcius');

// Start handling requests
$server->handle();
?>
