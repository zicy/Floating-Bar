<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion_db.php
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

if (!defined("DB_FLOATINGBAR_TABLE")) {
	define("DB_FLOATINGBAR_TABLE", DB_PREFIX."FLOATINGBAR_TABLE");
}

if (!defined("DB_FLOATINGBAR_SETTINGS_TABLE")) {
	define("DB_FLOATINGBAR_SETTINGS_TABLE", DB_PREFIX."FLOATINGBAR_SETTINGS_TABLE");
}

if (!defined("DB_FLOATINGBAR_SOCIAL_TABLE")) {
	define("DB_FLOATINGBAR_SOCIAL_TABLE", DB_PREFIX."FLOATINGBAR_SOCIAL_TABLE");
}
?>