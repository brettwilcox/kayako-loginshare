<?php

//
//	Invision Power Services 3.x Community Software
//

$result = mysql_query("SELECT * FROM  members WHERE email='$username'");
//This does the actual user lookup
while($row = mysql_fetch_array($result))
{
	$hash = $row['members_pass_hash'];
	$salt = $row['members_pass_salt'];
	$ipsid = $row['member_id'];
	$email = $row['email'];
}

// This is the actual user authentication.
if (md5(md5($salt) . md5($password)) ==  $hash) {
	$authUser = 'yes';

	// This gets the profile field id for first name
	$result = mysql_query("SELECT * FROM  pfields_data WHERE pf_key='$ips3_first_name'");
	while($row = mysql_fetch_array($result))
	{
		$firstnameid = $row['pf_id'];
	}

	// This gets the profile field id for last name
	$result = mysql_query("SELECT * FROM  pfields_data WHERE pf_key='$ips3_last_name'");
	while($row = mysql_fetch_array($result))
	{
		$lastnameid = $row['pf_id'];
	}

	// This gets the profile field id for phone
	$result = mysql_query("SELECT * FROM  pfields_data WHERE pf_key='$ips3_phone'");
	while($row = mysql_fetch_array($result))
	{
		$phoneid = $row['pf_id'];
	}

	// This gets the profile field id for company
	$result = mysql_query("SELECT * FROM  pfields_data WHERE pf_key='$ips3_company'");
	while($row = mysql_fetch_array($result))
	{
		$companyid = $row['pf_id'];
	}

	// This prefixes the field ID's with names so the user does not have to go looking through
	//	the database for them.  KISS basically...
	$firstnameid = "field_" . $firstnameid;
	$lastnameid = "field_" . $lastnameid;
	$phoneid = "field_" . $phoneid;
	$companyid = "field_" . $companyid;

	// This sets the user information
	$result = mysql_query("SELECT * FROM  pfields_content WHERE member_id='$ipsid'");
	while($row = mysql_fetch_array($result))
	{
		$firstname = $row[$firstnameid];
		$lastname = $row[$lastnameid];
		$phone = $row[$phoneid];
		$organization = $row[$companyid];
	}
	
	// This combines the firstname and lastname into a single variable
	$fullname = "$firstname" . " " . "$lastname";
	$designation = '';

}else {
	$authUser = 'no';
}

?>