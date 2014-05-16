<? ob_start(); ?>

<html>

<div>
	<h1>Kayako Loginshare System</h1>
	from <a href="http://code.google.com/p/kayako-loginshare/">Kayako Loginshare</a> <br /><br />
</div>

<div>Below is the actual XML output to the kayako system.</div>
<hr />
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

// This loads the system module that the user has selected
include "./modules/$system/$version.php";

//
// This is the actual XML data that gets outputted
//

// User Authentication Successful
if ($authUser == 'yes') {
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        echo "<loginshare>";
        echo "	<result>1</result>";
        echo "	<user>";
        echo "	<usergroup>Registered</usergroup>";
        echo "		<fullname>$fullname</fullname>";
		if  (empty($designation)) {
			//	Don't return designation, kayako does not require it.
		}else{
			echo "			<designation>$designation</designation>";
		}
        echo "      <organization>$organization</organization>";
        echo "      <organizationtype>restricted</organizationtype>";
        echo "			<emails>";
        echo "				<email>$email</email>";
        echo "			</emails>";
		if  (empty($phone)) {
			//	Don't return phone number, kayako does not require it.
		}else{
			echo "			<phone>$phone</phone>";
		}
        echo "	</user>";
        echo "</loginshare>";
}
// User Authentication Failed
else
{
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        echo "<loginshare>";
        echo "  <result>0</result>";
        echo "  <message>Invalid Username or Password</message>";
        echo "</loginshare>";
}

?>
<br /><br /><br /><br /><br />

<div>Below is a summary of what the system is getting from the database to send to kayako and authenticate the user.</div>
<hr>

<?php
if ($authUser == 'yes') {
		echo '<b>Did it work: </b><font color="green">It was a success!</font><br />';
		echo "<b>Authenticated: </b>"; if ($authUser == 'yes') { echo "1 (Yes)";} else { echo "0 (No)";}
		echo "<br />";
		echo "<b>Usergroup: </b>Registered <br />";
		echo "<b>Fullname: </b>" . $fullname . "<br />";
	if  (empty($designation)) { 
		echo "<b>Designation: </b>The system did not return a designation, but it is not a system requirement for kayako.<br />";
	}else{
		echo "<b>Designation: </b>" . $designation . "<br />";
	}
	if  (empty($organization)) { 
		echo "<b>Organization: </b>The system did not return an organization, but it is not a system requirement for kayako.<br />";
	}else{
		echo "<b>Organization: </b>" . $organization . "<br />";
	}
        echo "<b>Organization Type: </b>restricted<br />";
		echo "<b>Email: </b>" . $email . "<br />";
	if  (empty($phone)) { 
		echo "<b>Phone: </b>The system did not return a phone number, but it is not a system requirement for kayako.<br />";
	}else{
		echo "<b>Phone: </b>" . $phone . "<br />";
	}
        echo "<br /><a href='test.php'>Go Back and try again</a>";
}
// User Authentication Failed
else
{
	echo '<b>Did it work: </b><font color="red">Nope, there is something wrong.</font><br />';
	echo "Something went wrong.  Check the username and password and try again.<br>You might also want to check the config.php file.";
	echo "<br /><b>Username Sent: </b>" . $username;
	echo "<br /><b>Password Sent: </b>" . $password;
	echo "<br /><a href='test.php'>Go Back and try again</a>";
}

?>


</html>

<? ob_flush(); ?>