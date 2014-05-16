<?php

//
//	Interspire 6.x Shopping Cart
//

// Include the interspire init.php file for function
include ($interspirePath);

// This sets some values so the system does not display errors
$result = mysql_query("SELECT * FROM  isc_customers WHERE custconemail='$username'");
	if (mysql_num_rows($result)==0) {
			$entity = 'NA';
			$salt = 'NA';
			$custpass = 'NA';
	}
	// This is the actual customer lookup
	else{
		while($row = mysql_fetch_array($result))
			{
				$entity = $row['customerid'];
				$salt = $row['salt'];
				$custpass = $row['custpassword'];
				$authUser = 'no';
			}

			// This looks at the given passwords and combines hash with salt to produce final hash
			$entity = new ISC_ENTITY_CUSTOMER();
			$hash = $entity->generatePasswordHash($password, $salt);
				// This is if the user is authenticated
				if ($hash == $custpass) {
					$authUser = 'yes';
					$result = mysql_query("SELECT * FROM  isc_customers WHERE custconemail='$username'");
					while($row = mysql_fetch_array($result))
						{
							$firstname = $row['custconfirstname'];
							$lastname = $row['custconlastname'];
							$customerid = $row['customerid'];
							$salt = $row['salt'];
							$custpass = $row['custpassword'];
							$email = $row['custconemail'];
							$phone = $row['custconphone'];
						}

						$fullname = "$firstname" . " " . "$lastname";
						$designation = '';
				}
				// If the user is not authenticated
				else {
					$authUser = 'no';
				}
	}
?>