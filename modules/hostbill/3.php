<?php

//
//	HostBill 3.x System
//

$result = mysql_query("SELECT * FROM  hb_client_access WHERE email='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['password'];
	$hostbillid = $row['id'];
	$email = $row['email'];
}

// This is the actual drupal authentication and sets user information
if (md5($password) ==  $hash) {
	$authUser = 'yes';
	
	// This sets the email
	$result = mysql_query("SELECT * FROM  hb_client_details WHERE id='$hostbillid'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$phone = $row['phonenumber'];
		$organization = $row['companyname'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}
?>