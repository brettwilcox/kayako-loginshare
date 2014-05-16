<?php

//
//	OSCommerce 2.x System
//

//	Library for user password checking and authentication.
require 'PasswordHash.php';

$result = mysql_query("SELECT * FROM  customers WHERE customers_email_address='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['customers_password'];
	$oscid = $row['customers_id'];
}

//	This kicks off the phpass password hash checker.
$t_hasher = new PasswordHash(8, TRUE);

//	Now we check the user authentication.
$check = $t_hasher->CheckPassword($password, $hash);

if ($check) {
	$authUser = 'yes';

	// This sets the customer information
	$result = mysql_query("SELECT * FROM  customers WHERE customers_email_address='$username'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['customers_firstname'];
		$lastname = $row['customers_lastname'];
		$phone = $row['customers_telephone'];
		$email = $row['customers_email_address'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';
	$organization = '';

}else {
	$authUser = 'no';
}

?>