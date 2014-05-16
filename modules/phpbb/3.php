<?php

//
//	phpBB 3.x - Forum Software
//

//	Library for user password checking and authentication.
require 'phpass.php';

//	This combines the field names for the user information database lookup.
//	You will find it's counterpart in the config.php file.
$phpbbc_first_name = "pf_" . $phpbb_first_name;
$phpbbc_last_name = "pf_" . $phpbb_last_name;
$phpbbc_phone = "pf_" . $phpbb_phone;
$phpbbc_company = "pf_" . $phpbb_company;

//This does the user looktop and sets the information.
$result = mysql_query("SELECT * FROM  phpbb_users WHERE user_email='$username'");
while($row = mysql_fetch_array($result))
{
	$hash = $row['user_password'];
	$phpbbid = $row['user_id'];
	$email = $row['user_email'];
}

//	This kicks off the phpass password hash checker.
$t_hasher = new PasswordHash(8, TRUE);

//	Now we check the user authentication.
$check = $t_hasher->CheckPassword($password, $hash);
if ($check) {
	//	User was authentication.  Now we set the information.
	$authUser = 'yes';

	// This sets the user informaiton.
	$result = mysql_query("SELECT * FROM  phpbb_profile_fields_data WHERE user_id='$phpbbid'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row[$phpbbc_first_name];
		$lastname = $row[$phpbbc_last_name];
		$phone = $row[$phpbbc_phone];
		$organization = $row[$phpbbc_company];
	}

	//	Now we combine the first and last name into a single variable.
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}
// If the user is not authenticated, we deny them access.
else {
	$authUser = 'no';
}

//	Some cleanup code from phpass.
unset($t_hasher);

?>