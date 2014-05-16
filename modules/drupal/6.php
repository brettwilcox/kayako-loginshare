<?php

//
//	Drupal 6.x CMS
//

$result = mysql_query("SELECT * FROM  users WHERE mail='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
	$hash = $row['pass'];
	$drupaluid = $row['uid'];
}

//This looks up the user profile field for First Name
$result = mysql_query("SELECT * FROM  profile_fields WHERE name='$drupalFirstname'");
while($row = mysql_fetch_array($result))
{
	$drupalFirstnameid = $row['fid'];
}

//This looks up the user profile field for Last Name
$result = mysql_query("SELECT * FROM  profile_fields WHERE name='$drupalLastname'");
while($row = mysql_fetch_array($result))
{
	$drupalLastnameid = $row['fid'];
}

//This looks up the user profile field for Last Name
$result = mysql_query("SELECT * FROM  profile_fields WHERE name='$drupalPhone'");
while($row = mysql_fetch_array($result))
{
	$drupalPhoneid = $row['fid'];
}

// This is the actual drupal authentication and sets user information
if (md5($password) ==  $hash) {
	$authUser = 'yes';
	
		// This sets the email
		$result = mysql_query("SELECT * FROM  users WHERE mail='$username'");
		while($row = mysql_fetch_array($result))
		{
			$email = $row['mail'];
		}
		
		// This sets the firstname
		$result = mysql_query("SELECT * FROM  profile_values WHERE uid='$drupaluid'");
		while($row = mysql_fetch_array($result))
		{
			 if ($row['fid'] == $drupalFirstnameid)
				{
					$firstname = $row['value'];
				}
		}
		
		// This sets the lastname
		$result = mysql_query("SELECT * FROM  profile_values WHERE uid='$drupaluid'");
		while($row = mysql_fetch_array($result))
		{
			 if ($row['fid'] == $drupalLastnameid)
				{
					$lastname = $row['value'];
				}
		}
		
		// This  sets the phone
		$result = mysql_query("SELECT * FROM  profile_values WHERE uid='$drupaluid'");
		while($row = mysql_fetch_array($result))
		{
			 if ($row['fid'] == $drupalPhoneid)
				{
					$phone = $row['value'];
				}
		}
		
		// This combines the firstname and lastname into a single variable
		$fullname = "$firstname" . " " . "$lastname";
		$designation = '';
	
}else {
	$authUser = 'no';
}

?>