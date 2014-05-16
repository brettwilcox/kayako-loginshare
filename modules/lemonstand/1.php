<?php

//
//	LemonstandApp 1.x System
//

$result = mysql_query("SELECT * FROM  shop_customers WHERE email='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['password'];
}

// This is the actual user authentication.
if (md5(md5($lemonkey).$password) ==  $hash) {
	$authUser = 'yes';

	// This sets the user information
	$result = mysql_query("SELECT * FROM  shop_customers WHERE email='$username'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$phone = $row['phone'];
		$organization = $row['company'];
		$email = $row['email'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}

?>