<?php

//
//	Joomla 1.5.x + CMS
//

$result = mysql_query("SELECT * FROM  jos_users WHERE email='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
	$hash = $row['password'];
	$joomlaid = $row['id'];
}

//
//			How Joomla Hashes and Salts Passwords
//
//	The way the joomla system salts and md5's the password is it takes the plaintext password
//	and combines it with the salt.  So it becomes password+salt
//
//	You then take the combines salted password and md5 that.  It will then become the first part
//	of the joomla password in the database.  You are exploding at the colon :
//
//	It should make sense if you look closely at how the script is combining the passwords. and MD5'ing them
//
//	so.....
//
//	password+salt = passwordsalt
//	MD5 password salt, you get hash.
//	compare hash with first part of exploded password from database
//

$jparts = explode( ':', $hash );
$joomlahash = @$jparts[0];
$joomlasalt = @$jparts[1];

$joomlapass = $password . $joomlasalt;

// This is the actual drupal authentication and sets user information
if (md5($joomlapass) ==  $joomlahash) {
	$authUser = 'yes';
	
		// This sets the email
		$result = mysql_query("SELECT * FROM  jos_users WHERE email='$username'");
		while($row = mysql_fetch_array($result))
		{
			$email = $row['email'];
		}
		
		// This sets the name
		$result = mysql_query("SELECT * FROM  jos_users WHERE id='$joomlaid'");
		while($row = mysql_fetch_array($result))
		{
					$fullname = $row['name'];
		}
		
		$designation = '';
	
}else {
	$authUser = 'no';
}

?>