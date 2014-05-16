<?php
	
$proxy = new SoapClient($magUrl);
$sessionId = $proxy->login($magUser, $magKey);
 
 
$result = mysql_query("SELECT entity_id FROM mag_customer_entity WHERE email='$username' LIMIT 1");
while($row = mysql_fetch_array($result)) {
	if(!empty($row) ) {
		//var_dump($proxy->call($sessionId, 'customer.info', $row["entity_id"]));
		
		$results = $proxy->call($sessionId, 'customer.info', $row["entity_id"]);
		
		
		list($s,$salt) = explode(":",$results["password_hash"]);			
		$passhash = md5($salt.$password).':'.$salt;
		
		if($passhash === $results["password_hash"]) {
			
			$firstname = $results["firstname"];
			$lastname= $results["lastname"];
			
			$fullname = "$firstname" . " " . "$lastname";
			$email= $results["email"];
			
			
			$resultsA = $proxy->call($sessionId, 'customer_address.info', $results["default_billing"]);
			//var_dump($resultsA);
			$phone= $resultsA["telephone"];
			
			$authUser = 'yes';
		} else {
			$authUser = 'no';
		}
	} 
	else {
		$authUser = 'no';
	}

}

$proxy->endSession($sessionId);

?>