<?php

//
//	WHMCS 4+ Billing System
//
	
// URL to WHMCS API file
$url = $whmcsurl;

$postfields["username"] = $whmcsUser;
$postfields["password"] = md5($whmcsPass);
$postfields["action"] = "validatelogin"; #action performed by the API:Functions
$postfields["email"] = $username;
$postfields["password2"] = $password;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
$data = curl_exec($ch);
curl_close($ch);

$data = explode(";",$data);
foreach ($data AS $temp) {
  $temp = explode("=",$temp);
  $results[$temp[0]] = $temp[1];
}

if ($results["result"]=="success") {
	# Result was OK!
	$authUser = 'yes';
	
	$firstname = $results["firstname"];
	$lastname= $results["lastname"];
	
	$fullname = "$firstname" . " " . "$lastname";
	$email= $results["email"];
	$phone= $results["phonenumber"];
	
}else {
	# An error occured
	$authUser = 'no';
}

?>