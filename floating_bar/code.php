<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: code.php
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
include INFUSIONS."floating_bar/functions.php";

// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."floating_bar/locale/".$settings['locale'].".php")) {
// Load the locale file matching the current site locale setting.
include INFUSIONS."floating_bar/locale/".$settings['locale'].".php";
} else {
// Load the infusion's default locale file.
include INFUSIONS."floating_bar/locale/English.php";
}

// Home link
	echo "<center>";
	echo "<div id='demo-bar'>\n";
	echo "<ul>\n";
	echo "<li title='".$locale['ftb011']."'><a href='".BASEDIR."index.php' target='_blank'><img src='".INFUSIONS."floating_bar/includes/icons/home.png' alt='' /></a></li>\n";
	echo "</ul>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
// Home link slut

// Show good something
if (iGUEST) {
	echo "<ul>\n";
	echo "<li title='".$locale['ftb012']."'>\n";
	echo "<strong>";
	echo "<script type='text/javascript'>
		//<![CDATA[
		var today = new Date()
		var hour = today.getHours()
		if (hour > 17) {document.write('".$locale['tof003']."')}
		if (hour >= 6 && hour <= 11) {document.write('".$locale['tof001']."')}
		if (hour >= 12 && hour <= 17) {document.write('".$locale['tof002']."')}
		if (hour >= 0 && hour <6) {document.write('".$locale['tof001']."')}
		//]]>
		</script>";	
	echo ", ".$locale['ftb013']."</strong>\n";
	echo "</li>\n";
	echo "</ul>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
	
	} else {
	
	echo "<ul>\n";
	echo "<li>";
	echo "<strong>";
	echo "<a href='".BASEDIR."profile.php?lookup=".$userdata['user_id']."'>\n";
	echo "<script type='text/javascript'>
		var today = new Date()
		var hour = today.getHours()
		if (hour > 17) {document.write('".$locale['tof003']."')}
		if (hour >= 6 && hour <= 11) {document.write('".$locale['tof001']."')}
		if (hour >= 12 && hour <= 17) {document.write('".$locale['tof002']."')}
		if (hour >= 0 && hour <6) {document.write('".$locale['tof001']."')}
		</script>";	
	echo ", ".$userdata['user_name']."</a>";
	echo "</strong>";
	echo "</li>\n";
	echo "</ul>\n";
	}
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
// Show good something slut

// social sharing
if ($floating_bar_settings['ftb_social_sharing'] == 0) {
echo "<ul class='jx-bar-button-left''>\n";
	echo "<li title='".$locale['ftb060']."'><a href='#'><img src='".INFUSIONS."floating_bar/includes/icons/share.png' alt='' /></a>\n";
	echo "<ul>\n";
	// Google +1
if ($floating_bar_settings['ftb_google_1'] == 0) {
	echo "<li>";
	echo "<g:plusone size='medium' href='".$settings['siteurl']."'></g:plusone>";
	echo "</li>\n";
}
	// Google +1 slut
	//spacer
if ($floating_bar_settings['ftb_facebook_like'] == 0) {
	echo "<li>";
	echo "&nbsp;";
	echo "</li>\n";
	//spacer slut
	// Facebook like button
	echo "<li>";
	echo "<iframe src='http://www.facebook.com/plugins/like.php?app_id=153009648109056&amp;href=".$settings['siteurl']."&amp;send=false&amp;layout=button_count&amp;width=340&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:340px; height:21px;' allowTransparency='true'></iframe>";
	echo "</li>\n";
}
	// Facebook like button slut
if ($floating_bar_settings['ftb_twitter_follow'] == 0 && $floating_bar_settings['ftb_twitter_account'] !=='') {
	//spacer
	echo "<li>";
	echo "&nbsp;";
	echo "</li>\n";
	//spacer slut
	// Twitter follow
	echo "<li>";
if ($floating_bar_settings['ftb_theme'] == 0) {
	echo "<a href='http://twitter.com/".$floating_bar_settings['ftb_twitter_account']."' class='twitter-follow-button' data-show-count='false'>Follow @".$floating_bar_settings['ftb_twitter_account']."</a>";
} elseif ($floating_bar_settings['ftb_theme'] == 1) {
	echo "<a href='http://twitter.com/".$floating_bar_settings['ftb_twitter_account']."' class='twitter-follow-button' data-button='grey' data-text-color='#FFFFFF' data-link-color='#FFFFFF' data-show-count='false'>Follow @".$floating_bar_settings['ftb_twitter_account']."</a>";
} elseif ($floating_bar_settings['ftb_theme'] == 2) {
	echo "<a href='http://twitter.com/".$floating_bar_settings['ftb_twitter_account']."' class='twitter-follow-button' data-button='grey' data-text-color='#FFFFFF' data-link-color='#00AEFF' data-show-count='false'>Follow @".$floating_bar_settings['ftb_twitter_account']."</a>";
}
	echo "<script src='http://platform.twitter.com/widgets.js' type='text/javascript'></script>";
	echo "</li>\n";
}
	// Twitter follow slut
	echo "</ul>\n";
	echo "</li>\n";
	echo "</ul>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
}
// social sharing slut

// login and menu start
if (iGUEST) {
	echo "        <ul class='jx-bar-button-left'>\n";
	echo "			<li title='".$locale['ftb043']."'><a class='osx demo' href='#'>";
	echo "<img src='".INFUSIONS."floating_bar/includes/icons/login.png' alt='' />";
	echo "</a>\n";

	} else {
	
	echo "        <ul class='jx-bar-button-left'>\n";
	echo "			<li title='".$locale['ftb014']."'><a href='#'><img src='".INFUSIONS."floating_bar/includes/icons/option.png' alt='' /></a>\n";
	echo "                <ul>\n";
	}

if (iMEMBER) {

if ($floating_bar_settings['ftb_show_avatar_on_off'] == 1) {
if($userdata['user_avatar']){
	echo "<li><center><a href='".BASEDIR."profile.php?lookup=".$userdata['user_id']."'><img style='border:0' align='center' width='100;' height='100;' src='".BASEDIR."images/avatars/".$userdata['user_avatar']."' alt='' /></a></center></li>\n";
	
	} else {
	
	echo "<li><center><a id='avatar' href='".BASEDIR."profile.php?lookup=".$userdata['user_id']."'><img style='border:0' align='center' width='80' height='80' src='".IMAGES."avatars/noavatar100.png' alt='' /></a></center></li>\n";
	}
	}
    echo "<li><a id='profile' href='".BASEDIR."edit_profile.php' title='".$locale['global_120']."'><img src='".INFUSIONS."floating_bar/includes/icons/edit_profile.png' alt='' /> ".$locale['global_120']."</a></li>";
    echo "<li><a id='pm' href='".BASEDIR."messages.php' title='".$locale['global_121']."'><img src='".INFUSIONS."floating_bar/includes/icons/pm.png' alt='' /> ".$locale['global_121']."</a></li>";
    echo "<li><a id='userlist' href='".BASEDIR."members.php' title='".$locale['global_122']."'><img src='".INFUSIONS."floating_bar/includes/icons/member_list.png' alt='' /> ".$locale['global_122']."</a></li>";
    echo "".(iADMIN ? "<li><a id='admin' href='".ADMIN."index.php".$aidlink."' title='".$locale['global_123']."'><img src='".INFUSIONS."floating_bar/includes/icons/option.png' alt='' /> ".$locale['global_123']."</a></li> \n" : "")."";
    echo "<li><a id='logout' href='".BASEDIR."setuser.php?logout=yes' title='".$locale['global_124']."'><img src='".INFUSIONS."floating_bar/includes/icons/log_out.png' alt='' /> ".$locale['global_124']."</a></li>";
	echo "</ul>\n";
	
	} else {
	
	include INFUSIONS."floating_bar/includes/login/login-model.php";
	
	}
	echo "</li>\n";
	echo "</ul>\n";
// login and menu slut

// PM start
if (iMEMBER) {
	$msg_count = dbcount("(message_id)", DB_MESSAGES, "message_to='".$userdata['user_id']."' AND message_read='0'AND message_folder='0'");
	if ($msg_count) {
	echo "<li title='".$locale['ftb032']." ".$msg_count." ".$locale['ftb033']."'><a href='".BASEDIR."messages.php'><img src='".INFUSIONS."floating_bar/includes/icons/new_pm.png' alt='Get Social' /></a>\n";
	echo "</li>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
	
	} else { 
	
	echo "<ul>\n";
	echo "<li title='".$locale['global_121']."'><a href='".BASEDIR."messages.php'><img src='".INFUSIONS."floating_bar/includes/icons/pm.png' alt='' /></a></li>\n";
	echo "</ul>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
	}
	}
	
// PM slut

// Social links
if ($floating_bar_settings['ftb_get_social_on_off'] == 1) {
	echo "<ul>\n";
	echo "<li title='".$locale['ftb042']."'><a href='#'><img src='".INFUSIONS."floating_bar/includes/icons/network.png' alt='Get Social' /></a>\n";
	echo "<ul>\n";

// Facebook
if ($floating_bar_settings['ftb_facebook_on_off'] == 1 && $floating_bar_settings['facebook'] !=='') {
	echo "<li><a href='http://".$floating_bar_settings['facebook']."'><img src='".INFUSIONS."floating_bar/includes/icons/facebook.png' title='Facebook' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['facebook_name']."</a></li>\n";
	}
	
// Twitter
if ($floating_bar_settings['ftb_twitter_on_off'] == 1 && $floating_bar_settings['twitter'] !=='') {
	echo "<li><a href='http://".$floating_bar_settings['twitter']."'><img src='".INFUSIONS."floating_bar/includes/icons/twitter.png' title='Twitter' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['twitter_name']."</a></li>\n";
	}

// Youtube
if ($floating_bar_settings['ftb_youtube_on_off'] == 1 && $floating_bar_settings['youtube'] !=='') {
	echo "<li><a href='http://".$floating_bar_settings['youtube']."'><img src='".INFUSIONS."floating_bar/includes/icons/youtube.png' title='youtube' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['youtube_name']."</a></li>\n";
	echo "<li><a href='http://".$floating_bar_settings['youtube']."'><img src='".INFUSIONS."floating_bar/includes/icons/youtube.png' title='youtube' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['youtube_name']."</a></li>\n";
	}
	echo "</ul>\n";
	echo "</li>\n";
	echo "</ul>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
	}
// Social links slut

// message too users
if ($floating_bar_settings['ftb_message_too_users_on_off'] == 1 && $floating_bar_settings['message_too_users'] !=='') {
	echo "<div class='text-container'>\n";
	echo  parseubb(parsesmileys($floating_bar_settings['message_too_users']));
	echo "</div>\n";
	echo "<span class='jx-separator-left'>&nbsp;</span>\n";
	}
// message too users slut

// Feeds
if ($floating_bar_settings['ftb_feeds_on_off'] == 1 && $floating_bar_settings['feeds'] !=='' || $floating_bar_settings['ftb_feeds_2_on_off'] == 1 && $floating_bar_settings['feeds_2'] !=='') {
	echo "<ul class='jx-bar-button-right'>\n";
	echo "<li title='".$locale['ftb044']."'><a href='#'><img src='".INFUSIONS."floating_bar/includes/icons/feed.png' alt='' /></a>\n";
	echo "<ul>\n";
if ($floating_bar_settings['ftb_feeds_on_off'] == 1 && $floating_bar_settings['feeds'] !=='') {
	echo "<li><a href='http://".$floating_bar_settings['feeds']."'><img src='".INFUSIONS."floating_bar/includes/icons/feed-doc.png' title='".$floating_bar_settings['feeds_name']."' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['feeds_name']."</a></li>\n";
	}
if ($floating_bar_settings['ftb_feeds_2_on_off'] == 1 && $floating_bar_settings['feeds_2'] !=='') {	
	echo "<li><a href='http://".$floating_bar_settings['feeds_2']."'><img src='".INFUSIONS."floating_bar/includes/icons/feed-doc.png' title='".$floating_bar_settings['feeds_name_2']."' alt='' />&nbsp;&nbsp;&nbsp;".$floating_bar_settings['feeds_name_2']."</a></li>\n";
	}
	echo "</ul>\n";
	echo "</li>\n";
	echo "</ul>\n";
	}
// Feeds slut

	echo "<span class='jx-separator-right'>&nbsp;</span>\n";
	echo "</div>\n";
	echo "</center>";
	
	/// Below is to prevent the PHP-Fusion Copyright Footer Notice from being covered by the Jixedbar///
	if ($floating_bar_settings['ftb_top_bottom'] == 1) {
	add_to_head("<br />");
	} else {
	add_to_footer("<br /><br />");
	}
	///This is to  prevent the PHP-Fusion Copyright Footer Notice from being covered by the Jixedbar///
	
?>