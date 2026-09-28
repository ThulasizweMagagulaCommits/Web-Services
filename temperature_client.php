<!--
Simple Temperature conversion SOAP web service client converts Degress Celsius to Fahrenheit and vice versa - Junior Php Developer Portfolio
Author: Thulasizwe Magagula
Purpose: Web Services - Simple Temperature conversion SOAP web service conver Degress Celsius to Fahrenheit and vice versa
Demonstrates working with php, SOAP web Services, HTML
-->
<?php

// Initialize SOAP client to be used to call Web service functions
$client = new SoapClient('http://localhost/soap/temparature_server.php?wsdl', ['trace' => 1, 'cache_wsdl' => WSDL_CACHE_NONE]);

// See what functions are available
print "<p><p>";
var_dump($client->__getFunctions());
print "<p><p>";
$result=null;

?>
<HTML>

	<br><br><p>
	<form method="POST" action="">
			<label for="temp_value">Enter Temperature:</label>
			<input type="float" steps="any" id="temp_value" name="temp_value" required>
			<label for="conversion_type">Choose Conversion:</label>
			<select id="conversion_type" name="conversion_type">
				<option label="Choose Conversion" selected disabled hidden></option>
				<option value="c_to_f">Celcius to Fahrenheit</option>
				<option value="f_to_c">Fahrenheit to Celcius</option>
			</select>

			<button type="submit" id="submit_button" name="submit_button">Convert</button>
	</form><br><br>
	</p>


<?php

if(isset($_POST['submit_button'])){

// Making a SOAP call for the celciusToFahrenheit function	
$param_value = array('degrees'=>$_POST['temp_value']);
$param_value['conversion']=$_POST['conversion_type'];

//$param_conversion = $_POST['conversion_type'];
	if($param_value['conversion']=="c_to_f"){
		$response = $client->__soapCall('celciusToFahrenheit', $param_value);
		//$result=var_dump($response);
		echo "<h3>Result: ".$response." </h3>";
		print "<p>";
	} else if($param_value['conversion']=="f_to_c"){
		$response = $client->__soapCall('fahrenheitToCelcius', $param_value);
		//$result=var_dump($response);
		echo "<h3>Result: ".$response." </h3>";
		print "<p>";

	} 
}

?>	


</HTML>
