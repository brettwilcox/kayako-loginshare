<?php

//
//	PrestaShop 1.x System
//

$result = mysql_query("SELECT * FROM  ps_customer WHERE email='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['passwd'];
	$prestaid = $row['id_customer'];
}

// This is the actual zencart authentication and sets user information
if (md5($presta_cookie_key.$password) ==  $hash) {
	$authUser = 'yes';

	// This sets the customer information
	$result = mysql_query("SELECT * FROM  ps_customer WHERE email='$username'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}

?>