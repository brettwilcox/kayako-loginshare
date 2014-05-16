<?php

require './includes/PasswordHash.php';

# Try to use stronger but system-specific hashes, with a possible fallback to
# the weaker portable hashes.
$t_hasher = new PasswordHash(8, FALSE);

$result = mysql_query("SELECT * FROM  wp_users WHERE user_email='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
	$hash = $row['user_pass'];
	$wpid = $row['ID'];
}

$check = $t_hasher->CheckPassword($password, $hash);
if ($check) {
	$authUser = 'yes';
	
	// This sets the email
	$result = mysql_query("SELECT * FROM  wp_users WHERE user_email='$username'");
	while($row = mysql_fetch_array($result))
	{
		$email = $row['user_email'];
	}
	
	// This sets the firstname
	$result = mysql_query("SELECT * FROM  wp_usermeta WHERE user_id='$wpid'");
	while($row = mysql_fetch_array($result))
	{
		 if ($row['meta_key'] == 'first_name')
			{
				$firstname = $row['meta_value'];
			}
	}
	
	// This sets the lastname
	$result = mysql_query("SELECT * FROM  wp_usermeta WHERE user_id='$wpid'");
	while($row = mysql_fetch_array($result))
	{
		 if ($row['meta_key'] == 'last_name')
			{
				$lastname = $row['meta_value'];
			}
	}
	
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';
	
}
// If the user is not authenticated
else {
	$authUser = 'no';
}

?>