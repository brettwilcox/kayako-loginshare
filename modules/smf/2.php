<?php

//
//	SimpleMachines 2.x Forum Software
//

$result = mysql_query("SELECT * FROM  smf_members WHERE email_address='$username'");
//This does the user check
while($row = mysql_fetch_array($result))
{
    $hash = $row['passwd'];
    $smfuser = $row['member_name'];
    $smfid = $row['id_member'];
    $email = $row['email_address'];
}

// This is the authentication
if (sha1(strtolower($smfuser) . $password) ==  $hash) {
    $authUser = 'yes';

        // This sets the first name custom profile field information
        $result = mysql_query("SELECT * FROM  smf_custom_fields WHERE id_field='$smf_first_name'");
        while($row = mysql_fetch_array($result))
        {
            $firstnameid = $row['col_name'];
        }

        // This sets the last name custom profile field information
        $result = mysql_query("SELECT * FROM  smf_custom_fields WHERE id_field='$smf_last_name'");
        while($row = mysql_fetch_array($result))
        {
            $lastnameid = $row['col_name'];
        }

        // This sets the phone custom profile field information
        $result = mysql_query("SELECT * FROM  smf_custom_fields WHERE id_field='$smf_phone'");
        while($row = mysql_fetch_array($result))
        {
            $phoneid = $row['col_name'];
        }

        // This sets the company profile field information
        $result = mysql_query("SELECT * FROM  smf_custom_fields WHERE id_field='$smf_company'");
        while($row = mysql_fetch_array($result))
        {
            $companyid = $row['col_name'];
        }
        
        // This sets the first name
        $result = mysql_query("SELECT * FROM  smf_themes WHERE id_member='$smfid' and variable='$firstnameid'");
        while($row = mysql_fetch_array($result))
        {
            $firstname = $row['value'];
        }

        // This sets the last name
        $result = mysql_query("SELECT * FROM  smf_themes WHERE id_member='$smfid' and variable='$lastnameid'");
        while($row = mysql_fetch_array($result))
        {
            $lastname = $row['value'];
        }

        // This sets the phone
        $result = mysql_query("SELECT * FROM  smf_themes WHERE id_member='$smfid' and variable='$phoneid'");
        while($row = mysql_fetch_array($result))
        {
            $phone = $row['value'];
        }

        // This sets the organization
        $result = mysql_query("SELECT * FROM  smf_themes WHERE id_member='$smfid' and variable='$companyid'");
        while($row = mysql_fetch_array($result))
        {
                $organization = $row['value'];
        }
        
        // This combines the firstname and lastname into a single variable
        $fullname = "$firstname" . " " . "$lastname";
        $designation = '';

}else {
    $authUser = 'no';
}

?>