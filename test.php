<?php

// We require the master include for this to work.
include './includes/master_include.php';

?>

<html>

<div>
	<h1>Kayako Loginshare System</h1>
	from <a href="http://code.google.com/p/kayako-loginshare/">Kayako Loginshare</a> <br /><br />
</div>

<div>
	<h2>Paid Support Available!</h1>
	If you are having issues, send me and email <a href="mailto:brett@brettwilcox.com?Subject=Loginshare%20Help">brett@brettwilcox.com</a> and I can help resolve whatever your issues are.
	<br />
	I also do custom loginshare coding for a reasonable price.  Thanks for using my script!
	<br /><br />
</div>

<h4>
	Test the System
	<hr />
</h4>
<div>Use the form below to test the database and see if everything returns properly.</div>
<br />

<form action="testauth.php" method="post">
<fieldset>
<legend>Test area with more data returned to test and diagnose problems.</legend>
<?php echo $systemName; ?> Email Address: <input type="text" name="username" />
<?php echo $systemName; ?> Password: <input type="password" name="password" />
<input type="submit" />
</fieldset>
</form>

<form action="auth.php" method="post">
<fieldset>
<legend>This is the live enviroment that is the actual output to the kayako system.</legend>
<?php echo $systemName; ?> Email Address: <input type="text" name="username" />
<?php echo $systemName; ?> Password: <input type="password" name="password" />
<input type="submit" />
</fieldset>
</form>

<h4>
	System Info
	<hr>
</h4>
<div>Below, you will find the details of the system you have selected.</div>
<br />
<?php

echo "<img src='modules/$system/logo.png'><br /><br />";

echo "<b>This login module was Sponsored by: </b><a href=\"" . $sponsorURL . "\" target=\"_blank\">" . $sponsor . "</a><br />";
echo "<b>Using System: </b>" . $systemName . "<br />";
echo "<b>Using Version: </b>" . $systemVersion . "<br />";
echo "<b>Script Created By: </b>" . $moduleAuthor . "<br />";
echo "<b>Script Creation Date: </b>" . $moduleDate . "<br />";
echo "<b>Documentation:</b>";
echo $systemDocumentation;

?>

<br /><br />

<hr />
<div>This system is released under the <a href="http://www.opensource.org/licenses/mit-license.php" target="_blank">MIT lisense.</a><br /></div>
<div>Non-official script for use with the <a href="http://www.kayako.com" target="_blank">kayako</a> system.  Name and logo copyright <a href="http://www.kayako.com" target="_blank">kayako</a>.</div>
<div><br /><img src="images/kayako.png" /> </div>


</html>