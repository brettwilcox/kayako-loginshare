<?php

//
//	OpenCart 1.x Shopping Cart
//

$result = mysql_query("SELECT * FROM  customer WHERE email='$username'");
//This does the user lookup
while($row = mysql_fetch_array($result))
{
    $hash = $row['password'];
}

// This is the actual OpenCart authentication
if (md5($password) ==  $hash) {
    $authUser = 'yes';
    
        // This sets user information.
        $result = mysql_query("SELECT * FROM  customer WHERE email='$username'");
        while($row = mysql_fetch_array($result))
        {
            $email = $row['email'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = $row['telephone'];
        }
        
        // This combines the firstname and lastname into a single variable
        $fullname = "$firstname" . " " . "$lastname";
        $designation = '';

}else {
    $authUser = 'no';
}

?>