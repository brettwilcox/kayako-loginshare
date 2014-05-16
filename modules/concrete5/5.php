<?php

//
//	Concrete5 5.x System
//

$result = mysql_query("SELECT * FROM  Users WHERE uEmail='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['uPassword'];
}

// This is the actual Concrete5 authentication and sets user information
if (md5($password . ':' . $c5_salt) ==  $hash) {
	$authUser = 'yes';

	// This sets the information
	$result = mysql_query("SELECT * FROM  Users WHERE uEmail='$username'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row['uName'];
		$email = $row['uEmail'];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}

?>