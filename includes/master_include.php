<?php
//	Start off with our needed systen variables
include './config.php';

//	Easy MySQL connection
include './includes/opendb.php';

//	Functions that make everyones life easier
include './includes/functions.php';

//	Include system documentation
include "./modules/$system/$version.documentation.php";

?>