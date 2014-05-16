<?php

//
//	vBulletin 3.x - Forum Software
//

// Inital MySQL Query
$result = mysql_query("SELECT * FROM user WHERE email='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
	$hash = $row['password'];
	$salt = $row['salt'];
	$vbulletinuid = $row['userid'];
	$email = $row['email'];
}

//$saltedpass = md5(md5($password) . $salt);

if (md5(md5($password) . $salt) == $hash) {
	$authUser = 'yes';

	// This sets the user information
	$result = mysql_query("SELECT * FROM  userfield WHERE userid='$vbulletinuid'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row[$vb3Firstname];
		$lastname = $row[$vb3Lastname];
		$phone = $row[$vb3Phone];
		$organization = $row[$vb3Company];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	echo 'No';
}

?>