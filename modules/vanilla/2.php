<?php

//
//	Vanilla 2.x Forums
//

//  Library for user password checking and authentication.
require 'PasswordHash.php';

$result = mysql_query("SELECT * FROM  GDN_User WHERE Email='$username'");
//This does the user lookup
while($row = mysql_fetch_array($result))
{
    $hash = $row['Password'];
}

//  This kicks off the phpass password hash checker.
$t_hasher = new PasswordHash(8, TRUE);

$check = $t_hasher->CheckPassword($password, $hash);

if ($check) {
    $authUser = 'yes';

        $result = mysql_query("SELECT * FROM  GDN_User WHERE Email='$username'");
        //This does the user lookup
        while($row = mysql_fetch_array($result))
        {
            $firstname = $row['Name'];
            $email = $row['Email'];
        }
        
        // This combines the firstname and lastname into a single variable
        $fullname = "$firstname" . " " . "$lastname";
        $designation = '';

}else {
    $authUser = 'no';
}

?>