<?php

//  This is an example module that you can use as a template/guide in creating your own loginshare.

//  Below is a very simple module for checking a user against a database
//  using md5 as the password hashing.  You will need to customize where the
//  information is being pulled from and how the system does a password check
//  against the hash in the database.  Different systems hash passwords in different ways.
//  There are almost no two systems alike.

//  If you do not know what password hashing is, do a google search.  It is
//  vital to understand this concept before continuing.

//  All modules that you create go in the /modules/ directory.
//  When creating a module, set the folder name as the system you are doing an integration for.
//  There are three files that you will need to create inside this folder. The first is the 
//  actual authentication module.  The second is a documentation file. and the third is the logo file.
//  Name them as following - 
//      <version_number>.php
//      <version_number>.documentation.php
//      logo.png
//
//  When choosing version number, make sure it makes sense in regards to the system you are integrating
//  with.
//      example: drupal 7.12 - use 7
//               Joomla 1.3 - use 13 if there was a change from 1.2 otherwise use 1

//  If there is important informaiton that the user will need to enter into the module, put the
//  information in the root config.php file.  Information can include database tables, encryption keys, etc.
//  Make sure to prefix it with the system name and version number.

//  The information in the version.documentation.php file is self explanitory.

//  $username = email address the user entered from kayako.  This is a variable set from _POST
//  $password = plain text password entered from kayako.  This is a variable set from _POST

//  Below is a VERY simple example of a system using MD5 as the hashing algorithm.
//  I would advise you to look at other modules to see how everything goes together.
//  There are some great examples on how to handle different situations.
/*____________________________________________________________________________________________*/

//
//  <name of module> <version> <software type>
//

//  This is a simple database query and does the user lookup.
$result = mysql_query("SELECT * FROM  users WHERE email='$username'");
//  Make sure to get important information like password hash and user id's
while($row = mysql_fetch_array($result))
{
    // This gets the md5 hash out of the database.
    $hash = $row['password'];
}

//  Check the username against the hash in the database.
//  Some systems will have a more complex ways of checking passwords.
//  Do a google search for "name_of_system password hash"
if (md5($password) ==  $hash) {
    //  If authentication was successfull, then set $authuser to yes.
    $authUser = 'yes';

        //  There are six variables you will need to get from the database.
        //      $firstname - First Name
        //      $lastname - Last Name
        //      $email - Email Address
        //      $phone - Phone
        //      $organization - Organization
        //      $designation - Designation like Mr. Mrs. etc...
    
        // This sets the user information from the database to pass back to Kayako.
        $result = mysql_query("SELECT * FROM  users WHERE email='$username'");
        while($row = mysql_fetch_array($result))
        {
            // This sets the email returned to kayako
            $email = $row['email'];
            // This sets the first name returned to kayako
            $firstname = $row['firstname'];
            // This sets the last name returned to kayako
            $lastname = $row['lastname'];
            // This sets the phone number returned to kayako
            $phone = $row['phone'];
            // This sets the company name returned to kayako
            $organization = $row['company'];
        }
        
        // This combines the firstname and lastname into a single variable to putput to Kayako.
        // You should not need to change this.
        $fullname = "$firstname" . " " . "$lastname";

        //  Usually you do not need the designation.  Most systems do not have this in the database.
        //  Is it not a requirement for kayako.  You can just leave this.
        $designation = '';

// If the MD5 of $password and $hash are not the same, then deny the authentication.
}else {
    //  If authentication was not successfull, then set $authuser to no.
    //  The md5 of $password variable did not equal the $hash from the database.
    //  The password was not correct and so the authentication was denied.
    $authUser = 'no';
}

?>