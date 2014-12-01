<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: functions.php
| Infusion Author: Lippke
| Site: http://www.zicy.dk
| The source code of the bar is Copyright © Rawswift 
| (creator of jixedbar) under the MIT License
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

$floating_bar_settings = dbarray(dbquery("SELECT * FROM ".DB_FLOATINGBAR_TABLE));

// Ads Floating_Bar style.css to the header
if ($floating_bar_settings['ftb_theme'] == 0) {
add_to_head("<link type='text/css' href='".INFUSIONS."floating_bar/includes/theme/default/jx.stylesheet.css' rel='stylesheet' />");
}
if ($floating_bar_settings['ftb_theme'] == 1) {
add_to_head("<link type='text/css' href='".INFUSIONS."floating_bar/includes/theme/rave/jx.stylesheet.css' rel='stylesheet' />");
}
if ($floating_bar_settings['ftb_theme'] == 2) {
add_to_head("<link type='text/css' href='".INFUSIONS."floating_bar/includes/theme/vista/jx.stylesheet.css' rel='stylesheet' />");
}

// Ads the popup contact css to the header
add_to_head("<link type='text/css' href='".INFUSIONS."floating_bar/includes/css/contact.css' rel='stylesheet' />");

// Ads Floating_Bar Javascript to the footer
if ($floating_bar_settings['ftb_top_bottom'] == 1) {
add_to_footer("
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/jixedbar_top.js'></script>
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/jixedbar.min_top.js'></script>");
} else {
add_to_footer("
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/jixedbar.js'></script>
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/jixedbar.min.js'></script>");
}

// Ads the script to the footer there makes the Floating_Bar work
add_to_footer("
<script type='text/javascript'>
$(document).ready(function() {
$('#demo-bar').jixedbar({
});
});
</script>");

// Ads the javascript ther make the popup login works
add_to_footer("
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/jquery.simplemodal.js' charset='utf-8'></script>
<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/osx.js' charset='utf-8'></script>");

// Ads the javascript ther make the popup contact works
add_to_footer("<script type='text/javascript' src='".INFUSIONS."floating_bar/includes/js/contact.js' charset='utf-8'></script>");

// Ads the javascript ther make Google +1 works
if ($floating_bar_settings['ftb_google_1'] == 0) {
add_to_footer("
	<script type='text/javascript' src='https://apis.google.com/js/plusone.js'>
	 {lang: 'en-GB'}
	</script>");
} else {
}
?>