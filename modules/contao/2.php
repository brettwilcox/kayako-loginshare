<?php

//
//	Contao 1.5.x + CMS
//

$result = mysql_query("SELECT * FROM  tl_member WHERE email='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
	$hash = $row['password'];
}

$contaoparts = explode( ':', $hash );
$contaohash = @$contaoparts[0];
$contaosalt = @$contaoparts[1];

// This is the actual drupal authentication and sets user information
if (sha1($contaosalt . $password) ==  $contaohash) {
	$authUser = 'yes';

		// This sets the email
		$result = mysql_query("SELECT * FROM  tl_member WHERE email='$username'");
		while($row = mysql_fetch_array($result))
		{
            $email = $row['email'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            if (isset($row['phone'])){
            	$phone = $row['phone'];
            }
            else {
            	$phone = $row['mobile'];
            }
            $organization = $row['company'];
		}
		
        // This combines the firstname and lastname into a single variable
        $fullname = "$firstname" . " " . "$lastname";
		$designation = '';

}else {
	$authUser = 'no';
}

?>