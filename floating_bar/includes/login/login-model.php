<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: login-model.php
| Version: 1.00
| Infusion Author: Lippke
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

add_to_head("
<link type='text/css' href='".INFUSIONS."floating_bar/includes/css/login.css' rel='stylesheet' />
<link type='text/css' href='".INFUSIONS."floating_bar/includes/css/osx.css' rel='stylesheet' />");

// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."floating_bar/locale/".$settings['locale'].".php")) {
// Load the locale file matching the current site locale setting.
include INFUSIONS."floating_bar/locale/".$settings['locale'].".php";
} else {
// Load the infusion's default locale file.
include INFUSIONS."floating_bar/locale/English.php";
}

if (!iMEMBER) {
echo "<div id='osx-modal-content'>";
echo "<div id='osx-modal-title'><img src='".INFUSIONS."floating_bar/includes/images/login.png' alt='' />&nbsp;".$locale['ftb050']."</div>";
echo "<div class='close'><a href='#' class='simplemodal-close'>x</a></div>";
echo "<div id='osx-modal-data'>";
echo "<center>";

echo "<div id='login_response'><!-- spanner --></div> </center>";
echo "<center>";
echo "<form name='loginform_popup' method='post' action='".FUSION_SELF."'>";

echo "<input type='hidden' name='login' value='true' />";
// Username and password
echo "<label class='label2'>".$locale['ftb035']."</label><input  class='textbox_2' type='text' name='user_name' /><br />"; 
echo "<label class='label2'>".$locale['ftb036']."</label><input class='textbox_2' type='password' name='user_pass' /><br />"; 

// Remember login
echo "<input type='checkbox' name='remember_me' value='y' title='".$locale['global_103']."' style='vertical-align:middle;' />".$locale['global_103']."\n";

// Creates a horizontal line
echo "<hr width='70%' />";

echo "<input value='".$locale['ftb043']."' name='Login' id='submit2' class='button_2' type='submit' />";

// Link to Register.php
echo "<a href='".BASEDIR."register.php'><input value='".$locale['ftb037']."' name='Register' id='register' class='button_2' type='button' /></a>";

// Link to Lostpassword.php
echo "<a href='".BASEDIR."lostpassword.php'><input value='".$locale['ftb038']."' name='password' id='password' class='button_2' type='button' /></a>";

//spacer
echo "<br />";


	echo $locale['global_106']."\n";	

echo "</form>";
echo "</center>";
echo "<br />";
echo "<br />";
echo "<a href='#' id='cancel' class='close'><img align='left' src='".INFUSIONS."floating_bar/includes/icons/log_out.png' alt='' />&nbsp;</a>";
echo $locale['ftb039']."&nbsp;<a href='#' id='cancel_2' class='simplemodal-close'>".$locale['ftb040']."</a>&nbsp;".$locale['ftb041']."";
echo "</div>";
echo "</div>";
}
?>