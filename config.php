<?php
/*
------------------------------------------------------------------------------------

		Kayako Loginshare Integration System v.3.1
			by Brett Wilcox (www.giverepair.com)
		
		Need help? Shot me an email!
			brett@brettwilcox.com
				I can help with if you get stuck.
				I also do custom coding for reasonable prices.
			
		Buy me a beer!  If you are so inclined, my
			paypal email is brett@brettwilcox.com
			
------------------------------------------------------------------------------------

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

MIT License

Copyright (c) 2012 Give Repair, LLC.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Choose system to integrate with
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Contao - Just enter database information
//		Set system to contao
//			For version 2.7+ use - 2
//
//	CS-Cart - Just enter database information
//		Set system to cscart
//			For version 2.x use - 2
//
//	Drupal - See configuration options below
//		Set system to drupal
//			For version 7 use - 7
//			For version 6 use - 6
//
//	HostBill - Just enter database information
//		Set system to hostbill
//			For version 3.x use - 3
//				This may also work for other versions, but it has not been tested.
//
//  Interspire Shopping Cart - See configuration options below
//		Set system to interspire
//			For version 6 use - 6
//
//	Invision Power Board - See configuration options below
//		Set system to ips
//			For version 3 use - 3
//
//	Joomla - See comments below
//		Set system to joomla
//			For version 1.5+ use - 15
//
//	Lemonstand - Just enter database information
//		Set system to lemonstand
//			For version 1.x use - 1
//
//	Magento - See comments below
//		Set system to magento
//			For version 1.4+ use - 14
//
//	OpenCart - Just enter database information
//		Set system to opencart
//			For version 1.x use - 1
//
//	OSCommerce - Just enter database information
//		Set system to oscommerce
//			For version 2.x use - 2
//
//	phpBB - See configuration options below
//		Set system to phpbb
//			For version 3 use - 3
//
//	PrestaShop - See configuration options below
//		Set system to prestashop
//			For version 1.x use - 1
//
//	SimpleMachines / SMF - See configuration options below
//		Set system to smf
//			For version 2 use - 2
//
//	Vanilla Forums - Just enter database information
//		Set system to vanilla
//			For version 2 use - 2
//
//	vBulletin - See configuration options below
//		Set system to vbulletin
//			For version 3 use - 3
//			For version 4 use - 3
//				There were no changes between 3 and 4.
//
//	WHMCS - database information not required.  See setup options blelow
//		NOTEICE! We now recommend that you use the official plugin.
//		Please go here for more details - http://docs.whmcs.com/Kayako
//		Set system to whmcs
//			For version 4 use - 4     
//				This may work with 3.x, but I have not tested it.  Please let me know if it does.
//				Also tested with version 5.  Use version 4 as there were no API changes.
//
//	Wordpress - See comments below
//		Set system to wordpress
//			For version 2.6+ use - 26
//
//	ZenCart - Just enter database information
//		Set system to zencart
//			For version 1.5 use - 15
//				This may work on older versions, but it has not been tested.
//
$system = 'change_me';
$version = 'change_me';

//	Setup the database that you want to integrate with
//
// Database Hostname (usually localhost)
$dbhost = 'localhost';
// Database Name
$dbname = 'change_me';
// Database User
$dbuser = 'change_me';
// Database Password
$dbpass = 'change_me';




/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Concrete5 5.x
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	You will need to enter the database details above.  You will also need to enter the store encrytion
//	key below.  You will find this key in /config/site.php
//	It is under the string for the variable PASSWORD_SALT.
//
$c5_salt = "CHANGE_ME_WITH_PROPER_SALT";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Drupal 7 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	First we will need to setup some custom fields in drupal for first name, last name, and phone.
//	Go to configuration > account settings.  You will see some tabs, we want to select the Manage fields tab.
//	If you have already setup fields with information regarding first name, last name and phone,
//	please enter the Name field below.  If you have not, I would recommend using the following -
//
//	Label: First Name   Name: first_name    Field type: Text    Widget Text Field
//	Label: Last Name   Name: last_name    Field type: Text    Widget Text Field
//	Label: Phone   Name: phone    Field type: Text    Widget Text Field
//
//	If you use the above, then what I have setup below should work just fine.
//
//
//			IMPORTANT FOR PEOPLE THAT HAVE DONE AN UPGRADE FROM 6 to 7
//
//
//	The following snippet was taken from the drupal website.
//
// Since the Profile module is deprecated and included with Drupal 7 for legacy reasons only, 
// you are discouraged from using it. For this reason, the module is hidden by default, except
// for sites using the Profile module that were upgraded from an earlier version.
//
//	If you did an upgrade from drupal 6, then this will probably not work.  There are a lot of
//	different ways to setup drupal and with the legacy information coming over, I can't account for
//	all situations.  You should be able to look at both the drupal 6 and drupal 7 modules to see
//	how the information is being gathered and modify to your needs.  You are basically just looking
//	in different places in the database for the same information.
//
// What is the Name field for First Name
$drupal7Firstname = 'field_first_name';
// What is the Name field for Last Name
$drupal7Lastname = 'field_last_name';
// What is the Name field for Phone
$drupal7Phone = 'field_phone';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Drupal 6 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	Drupal requires that the Profile module be enabled.
//	Go to Administrator -> Site Building -> Modules -> Enable Profile and click Save configuration.
// This will allow you to create configurable profile fields.
//	Go to Administrator -> User management -> Profiles
//	You will need to create 3 profile fields for First Name, Last Name, and Phone number
//	Under Add new field, click single-line textfield
//	You will be presented with options for creating the custom field
//	Under Category, use any category that you wish
// Under Title, use First Name, Last Name, Phone or any name that you wish.  This is what is presented to the user
//	Under Form name, use profile_first_name, profile_last_name or profile_phone depending on what you are creating
// Give an explanation about what this field is for
//	Under Visability, select Public field, content shown on profile page but not used on member list pages.
//	Slect both checkboxes for The user must enter a value. and Visible in user registration form.
//
//	The script will handle using different form names, but only change these if you know what you are doing.
//
// What was the form name used for First Name
$drupalFirstname = 'profile_first_name';
// What was the form name used for Last Name
$drupalLastname = 'profile_last_name';
// What was the form name used for Phone Number
$drupalPhone = 'profile_phone';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// vBulletin 3 and 4 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	vBulletin requires that we create some profile fields to get the required informaiton.
//
//	Login to the admin panel.  under "User Profile Fields", there is a link for "User Profile Manager".  Click
//	this link so you can see what is already available.  If this is a standard install and there are no
//	fields currently setup with user information for first name, last name, phone and company, we will need
//	to set these up.
//
//	Under the same "User Profile Fields" there is a link for "Add New User Profile Field".  We are goint to
//	setup fields for first name, last name, phone and company.  Click the link and select Single-Line Text Box.
//	Click continue and set the title as "First Name" and give it a description.  I would change the settings for
//	Private Field to yes, Field Searchable on Members List to no, and Show on Members List to no.  This ensures
//	the privacy of the user.  Do this again for Last Name, Phone, and Company.
//
//	Once you have completed setting up the profile fields, you will not need to see what the field names are.
//	To do this, head over to the User Profile Field Manager under User Profile Fields.  In the list, you will
//	see the names of the fields created for each of the profile fields.  Once you determin what the correct names
//	should be, please enter them below so the system will look in the correct place for the profile information.
//
// What was the form name used for First Name
$vb3Firstname = 'field5';
// What was the form name used for Last Name
$vb3Lastname = 'field6';
// What was the form name used for Phone Number
$vb3Phone = 'field7';
// What was the form name used for Company
$vb3Company = 'field8';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Invision Power Board 3 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	Invision requires that we create some profile fields to get the required informaiton.
//
//	Login to the Admin panel and hover over the members tab and select "Custom Profile Fields".  Click
//	"Add Field".  You will not be presented with a form to add a custom field.  In the "Field Title" use
//	"First Name", give it a description, change the Field Type to "Text Input".  Now comes the importand part.
//	You will need to fill out the Field Key field.  Please make sure to remember what this is.  You will need
//	to enter this ifnroamtion below.  It is what allows the script to go out and find the appropriate field
//	with the correct informaiton.  Change Field can be edited by the member? to yes, and change
//	Make this a private profile field? to yes.  We do not want to ensure the provacy of the user.  Click save.
//
//	Now repeat for last name, phone and company.  Make sure that you change the fields below to match what you
//	have set for the Field Key.
//
// What was the Field Key used for First Name
$ips3_first_name = "first_name";
// What was the Field Key used for Last Name
$ips3_last_name = "last_name";
// What was the Field Key used for Phone Number
$ips3_phone = "phone";
// What was the Field Key used for Company
$ips3_company = "company";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// phpBB 3 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	phpBB requires that we create some profile fields to get the required informaiton.
//
//	Login to the Admin panel and go to the Users and Groups tab.  On the left you will see "Custom Profile Fields".
//	Click this link.  On the bottom of the list, there is an option to create a new field.  Select "Single Text Field"
//	before clicking "create new field".  On the setup page, you will now want to fill in the required information.
//	In the "Field identification:" use first_name.  For the privacy of the user, I would uncheck "Publicly display
//	profile field:".  Fill in the rest of the form as you see fit.
//
//	Now repeat for last name, phone and company.  Make sure that you change the fields below to match what you
//	have set for the Field identification.
//
// What was the Field identification used for First Name
$phpbb_first_name = "first_name";
// What was the Field identification used for Last Name
$phpbb_last_name = "last_name";
// What was the Field identification used for Phone Number
$phpbb_phone = "phone";
// What was the Field identification used for Company
$phpbb_company = "company";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// SimpleMachines / SMF 2 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	First, login to SMF and hover over Admin and click Features and Options
//	Now hover over Configuration and click Core Features.
//	How select the on button for Advanced profile fields and click save.
//	Again, hover over Configuration, then features and options and click Profile fields.
//	Under Custom Profile Fields, click New Field
//	Set the Name: field to First Name
//	You can then setup the rest of the fields however you like.
//
//	Now repeat for last name, phone and company.  Make sure that you change the fields below to match what you
//	have set for the Field identification.
//
//	Now we will need to set the variables below.  To do this, you will need to hover your mouse over each link.
//	You will see in the link a fid=SOME_NUMBER.  Set this number to the variables below.
//
// What was the Field identification used for First Name
$smf_first_name = "1";
// What was the Field identification used for Last Name
$smf_last_name = "2";
// What was the Field identification used for Phone Number
$smf_phone = "3";
// What was the Field identification used for Company
$smf_company = "4";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Interspire Shopping Cart 6 Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Interspire requires that a function be loaded from the system for the hashing algorithm.
//	That is why we have to include it
//
// Full path to init.php located in interspires root folder.
$interspirePath = '/home/user/public_html/store/init.php';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	WHMCS 4.x Billing System Options
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		NOTEICE! We now recommend that you use the official plugin.
//		Please go here for more details - http://docs.whmcs.com/Kayako
//
//	Information on setup can be found here - http://wiki.whmcs.com/API
//	All that should have to be done is setup a user with access to the API
//	After that you will need to go to the General Settings > Security and setup the IP address
//	of where the script will be accessing WHMCS from
//	Then just point the URL below to the WHMCS api.php located in the includes directory
//
//	It is recommended to use SSL with this since you do not want data sent without encrypting first.
//
//	WHMCS Admin Username
$whmcsUser = 'username';
//	WHMCS Admin Password
$whmcsPass = 'password';
//	WHMCS API URL
$whmcsurl = 'https://www.domain.com/whmcs/includes/api.php';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Wordpress Blogging Platform
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Wordpress uses the newer phpass to salt the user passwords
//	There are no config options yet for this.
//	The only problem is that there is no Phone number that goes across
//	This is due to wordpress not using it by default.  If there is a module,
//	then I have provided a pretty good stepping stone to get to it.
//	What will happen is if a user has a password setup in Kayako, and they
//	login using wordress, it will erase the password.  I am looking into how to
//	fix this.


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Vanilla Forums 2.x
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	All that should need to be done is set the Database information above.
//
//	One thing to note, the system will not return a name or other information.  There is no option in Vanilla
//	to setup custom profile fields.  I have done the next best thing.  I have the forum username setup to 
//	come accross as firstname.


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	LemonstandApp 1.x
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	You will need to enter the database details above.  You will also need to enter the store encrytion
//	key below.  Lemonstand uses the encryption key to hash the password.
//
$lemonkey = 'replace_with_store_encryption_key';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	Magento 1.4.x
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	All that should have to be done is setup a user with access to the API with 
//	assigned permission role to Customers module
//
//	Magento API username
$magUser = 'username';
//	Magento API user KEY
$magKey = 'password';
//	Magento API URL
$magUrl = 'https://magentohost/api/soap/?wsdl';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	PrestaShop 1.x
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//	There is a variable that you will need to get from a file.  It is located in /config/settings.inc.php
//	The variable is _COOKIE_KEY_
//	You will need to copy this long string into the variable below.  This is the salt that generates the passwords.
//
$presta_cookie_key = 'CHANGE_ME_WITH_PROPER_KEY';

?>