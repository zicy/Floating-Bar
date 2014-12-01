<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusions.php
| Author: Nick Jones
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

include INFUSIONS."floating_bar/infusion_db.php";

if (file_exists(INFUSIONS."floating_bar/locale/".$settings['locale'].".php")) {
	include INFUSIONS."floating_bar/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."floating_bar/locale/English.php";
}

// Infusion general information
$inf_title = $locale['ftb001'];
$inf_description = $locale['ftb002'];
$inf_version = "3.0 - Alpha";
$inf_developer = "lippke";
$inf_weburl = "http://www.zicy.dk";
$inf_folder = "floating_bar";
$inf_panel 	= "floating_bar_panel";

$inf_newtable[1] = DB_FLOATINGBAR_TABLE." (
facebook_name 						TEXT  DEFAULT '' NOT NULL,
facebook 							TEXT  DEFAULT '' NOT NULL,
youtube_name 						TEXT  DEFAULT '' NOT NULL,
youtube 							TEXT  DEFAULT '' NOT NULL,
twitter_name 						TEXT  DEFAULT '' NOT NULL,
twitter 							TEXT  DEFAULT '' NOT NULL,
feeds_name 							TEXT  DEFAULT '' NOT NULL,
feeds 								TEXT  DEFAULT '' NOT NULL,
feeds_name_2 						TEXT  DEFAULT '' NOT NULL,
feeds_2 							TEXT  DEFAULT '' NOT NULL,
message_too_users 					TEXT  DEFAULT '' NOT NULL,
ftb_twitter_account					TEXT  DEFAULT '' NOT NULL,
ftb_get_social_on_off 				TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_facebook_on_off 				TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_youtube_on_off 					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_twitter_on_off 					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_feeds_on_off 					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_feeds_2_on_off 					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_message_too_users_on_off 		TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_show_avatar_on_off 				TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_top_bottom						TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_theme							TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_google_1						TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_facebook_like					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_twitter_follow					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL,
ftb_social_sharing					TINYINT(1) UNSIGNED DEFAULT '0' NOT NULL
) ENGINE=MyISAM;";
 
$inf_insertdbrow[1] = DB_FLOATINGBAR_TABLE." (facebook_name, facebook, youtube_name, youtube, twitter_name, twitter, feeds_name, feeds, feeds_name_2, feeds_2, message_too_users, ftb_facebook_on_off, ftb_youtube_on_off, ftb_twitter_on_off, ftb_feeds_on_off, ftb_feeds_2_on_off, ftb_message_too_users_on_off, ftb_get_social_on_off, ftb_show_avatar_on_off, ftb_top_bottom, ftb_theme, ftb_google_1, ftb_facebook_like, ftb_twitter_follow, ftb_social_sharing, ftb_twitter_account) VALUES('".$locale['ftb053']."', 'facebook.com', '".$locale['ftb054']."', 'youtube.com', '".$locale['ftb055']."', 'twitter.com', '".$locale['ftb056']."', '".$locale['ftb062']."','".$locale['ftb057']."', '".$locale['ftb063']."', '".$locale['ftb049']."', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'zicy_lippke')";
$inf_insertdbrow[2] = DB_PANELS." SET panel_name='".$locale['ftb001']."', panel_filename='".$inf_panel."', panel_content='', panel_side=2, panel_order='1', panel_type='file', panel_access='100', panel_display='1', panel_status='1'";
$inf_droptable[1] = DB_FLOATINGBAR_TABLE;
$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='floating_bar_panel'";

$inf_adminpanel[1] = array(
	"title" => $locale['ftb001'],
	"image" => "admin.gif",
	"panel" => "floating_bar_admin.php",
	"rights" => "FTB"
);

?>