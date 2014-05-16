<?php

// We require the master include for this to work.
include './includes/master_include.php';

// This is the post information that kayako sends to the script
$username = $_POST["username"];
$password = $_POST["password"];
$ipaddress = $_POST["ipaddress"];

//	Prevent SQL injection attack
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$ipaddress = mysql_real_escape_string($ipaddress);

// Give Kayako the IP address of user logging in
// $ipaddress = getRealIpAddr();

// Set user authentication to null
$authUser = '';

//	This loads the system module that the user has selected
include "./modules/$system/$version.php";

//
// This is the actual XML data that gets outputed
//

// User Authentication Successful
if ($authUser == 'yes') {
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        echo "<loginshare>\n";
        echo "	<result>1</result>\n";
        echo "	<user>\n";
        echo "	<usergroup>Registered</usergroup>\n";
        echo "		<fullname>$fullname</fullname>\n";
		if  (empty($designation)) {
			//	Don't return designation, kayako does not require it.
		}else{
			echo "			<designation>$designation</designation>\n";
		}
//        echo "      <organization>$organization</organization>\n";
//        echo "      <organizationtype>restricted</organizationtype>\n";
        echo "			<emails>\n";
        echo "				<email>$email</email>\n";
        echo "			</emails>";
		if  (empty($phone)) {
			//	Don't return phone number, kayako does not require it.
		}else{
			echo "			<phone>$phone</phone>\n";
		}
        echo "	</user>\n";
        echo "</loginshare>";
}
// User Authentication Failed
else
{
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        echo "<loginshare>\n";
        echo "  <result>0</result>\n";
        echo "  <message>Invalid Username or Password</message>\n";
        echo "</loginshare>";
}

?>