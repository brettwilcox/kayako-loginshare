<?php

//
//	CS-Cart 2.x Shopping Cart
//

$result = mysql_query("SELECT * FROM  cscart_users WHERE email='$username'");
//This does the actual user check
while($row = mysql_fetch_array($result))
{
    $hash = $row['password'];
}

// This is the actual cscart authentication and sets user information
if (md5($password) ==  $hash) {
    $authUser = 'yes';
    
        // This sets the email
        $result = mysql_query("SELECT * FROM  cscart_users WHERE email='$username'");
        while($row = mysql_fetch_array($result))
        {
            $email = $row['email'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = $row['phone'];
            $organization = $row['company'];
        }
        
        // This combines the firstname and lastname into a single variable
        $fullname = "$firstname" . " " . "$lastname";
        $designation = '';
    
}else {
    $authUser = 'no';
}

?>