<?php

//
//	Drupal 7.x CMS
//

//	This is a required file for the custom PHPass library that drupal 7 introduced.
require './includes/drupal7password.inc';

//	And so we kick off the whole thing.  Start with getting basic information

//This does the actual user check and does some initial information gathering
$result = mysql_query("SELECT * FROM users WHERE mail='$username'");
while($row = mysql_fetch_array($result))
{
	$accounthash = $row['pass'];
	$drupaluid = $row['uid'];
	$email = $row['mail'];
}

//	This is the drupal 7 auth stuff.

//	This is the default algorithm used by drupal 7
$algo = 'sha512';

//	This creates a hash of the password provided to check against the database hash
$hash = _password_crypt($algo, $password, $accounthash);

// This is the actual drupal authentication and sets user information
if ($hash && $accounthash == $hash) {
	$authUser = 'yes';

	//	First we must do some combining of terms to set the appropriate field names.
	//	First Name Field
	$drupalfirstcomb = "field_data_" . $drupal7Firstname;
	//	First Name Value
	$drupalfirstvalue = $drupal7Firstname . "_value";
	//	Last Name Field
	$drupallastcomb = "field_data_" . $drupal7Lastname;
	//	Last Name Value
	$drupallastvalue = $drupal7Lastname . "_value";
	//	Phone Field
	$drupalphonecomb = "field_data_" . $drupal7Phone;
	//	Phone Value
	$drupalphonevalue = $drupal7Phone . "_value";

	//	This sets the first name
	$result = mysql_query("SELECT * FROM $drupalfirstcomb WHERE entity_id='$drupaluid'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row["$drupalfirstvalue"];
	}
	
	//	This sets the last name
	$result = mysql_query("SELECT * FROM $drupallastcomb WHERE entity_id='$drupaluid'");
	while($row = mysql_fetch_array($result))
	{
		$lastname = $row["$drupallastvalue"];
	}
	
	//	This sets the phone
	$result = mysql_query("SELECT * FROM $drupalphonecomb WHERE entity_id='$drupaluid'");
	while($row = mysql_fetch_array($result))
	{
		$phone = $row["$drupalphonevalue"];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';
	
}else {
	$authUser = 'no';
}

?>