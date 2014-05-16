<?php

//
//	Zencart 1.5 System
//

$result = mysql_query("SELECT * FROM  customers WHERE customers_email_address='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['customers_password'];
	$zencartid = $row['customers_id'];
}

$zcparts = explode( ':', $hash );
$zchash = @$zcparts[0];
$zcsalt = @$zcparts[1];

// This is the actual zencart authentication and sets user information
if (md5($zcsalt . $password) . ':' . $zcsalt ==  $hash) {
	$authUser = 'yes';

	// This sets the customer information
	$result = mysql_query("SELECT * FROM  customers WHERE customers_email_address='$username'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['customers_firstname'];
		$lastname = $row['customers_lastname'];
		$phone = $row['customers_telephone'];
		$organization = $row['companyname'];
		$email = $row['customers_email_address'];
	}

	// This sets the organization
	$result = mysql_query("SELECT * FROM  address_book WHERE customers_id='$zencartid'");
	while($row = mysql_fetch_array($result))
	{
		$organization = $row['entry_company'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}

?>