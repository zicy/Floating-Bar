<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: floating_bar_admin.php
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
require_once "../../maincore.php";
include_once INCLUDES."bbcode_include.php";
require_once INCLUDES."infusions_include.php";
require_once THEMES."templates/admin_header.php";
include INFUSIONS."floating_bar/infusion_db.php";
include LOCALE.LOCALESET."admin/settings.php";

// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."floating_bar/locale/".$settings['locale'].".php")) {
// Load the locale file matching the current site locale setting.
include INFUSIONS."floating_bar/locale/".$settings['locale'].".php";
} else {
// Load the infusion's default locale file.
include INFUSIONS."floating_bar/locale/English.php";
}

if (!checkrights("FTB") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../../index.php"); }
	
	opentable($locale['ftb052']);
	echo "<table cellpadding='0' cellspacing='1' width='100%' class='tbl-border center'>\n<tr>\n";
	


    if (isset($_GET['status']) && !isset($message)) {
    if ($_GET['status'] == "su") {
    $message = $locale['ftb_saved'];
    } elseif ($_GET['status'] == "nsu") {
    $message = $locale['ftb_not_saved'];
    }
    if ($message) {   echo "<div id='close-message'><div class='admin-message'>".$message."</div></div>\n"; }
    }

    if (isset($_POST['ftbs_save'])) {
    $ftb_facebook_on_off =(isset($_POST['ftb_facebook_on_off']) && isNum($_POST['ftb_facebook_on_off'])) ? $_POST['ftb_facebook_on_off'] : "0";
    $ftb_youtube_on_off =(isset($_POST['ftb_youtube_on_off']) && isNum($_POST['ftb_youtube_on_off'])) ? $_POST['ftb_youtube_on_off'] : "0";
    $ftb_twitter_on_off =(isset($_POST['ftb_twitter_on_off']) && isNum($_POST['ftb_twitter_on_off'])) ? $_POST['ftb_twitter_on_off'] : "0";
    $ftb_feeds_on_off =(isset($_POST['ftb_feeds_on_off']) && isNum($_POST['ftb_feeds_on_off'])) ? $_POST['ftb_feeds_on_off'] : "0";
	$ftb_feeds_2_on_off =(isset($_POST['ftb_feeds_2_on_off']) && isNum($_POST['ftb_feeds_2_on_off'])) ? $_POST['ftb_feeds_2_on_off'] : "0";
    $ftb_message_too_users_on_off =(isset($_POST['ftb_message_too_users_on_off']) && isNum($_POST['ftb_message_too_users_on_off'])) ? $_POST['ftb_message_too_users_on_off'] : "0";
    $ftb_get_social_on_off =(isset($_POST['ftb_get_social_on_off']) && isNum($_POST['ftb_get_social_on_off'])) ? $_POST['ftb_get_social_on_off'] : "0";
	$ftb_show_avatar_on_off =(isset($_POST['ftb_show_avatar_on_off']) && isNum($_POST['ftb_show_avatar_on_off'])) ? $_POST['ftb_show_avatar_on_off'] : "0";
	$ftb_top_bottom =(isset($_POST['ftb_top_bottom']) && isNum($_POST['ftb_top_bottom'])) ? $_POST['ftb_top_bottom'] : "0";
	
    $result = dbquery("UPDATE ".DB_FLOATINGBAR_TABLE." SET    facebook_name='".addslashes($_POST['facebook_name'])."', facebook='".addslashes($_POST['facebook'])."', youtube_name='".addslashes($_POST['youtube_name'])."', youtube='".addslashes($_POST['youtube'])."', twitter_name='".addslashes($_POST['twitter_name'])."', twitter='".addslashes($_POST['twitter'])."', feeds_name='".addslashes($_POST['feeds_name'])."', feeds='".addslashes($_POST['feeds'])."', feeds_name_2='".addslashes($_POST['feeds_name_2'])."', feeds_2='".addslashes($_POST['feeds_2'])."', message_too_users='".addslashes($_POST['message_too_users'])."', ftb_theme='".addslashes($_POST['ftb_theme'])."', ftb_google_1='".addslashes($_POST['ftb_google_1'])."', ftb_facebook_like='".addslashes($_POST['ftb_facebook_like'])."', ftb_twitter_follow='".addslashes($_POST['ftb_twitter_follow'])."', ftb_social_sharing='".addslashes($_POST['ftb_social_sharing'])."', ftb_twitter_account='".addslashes($_POST['ftb_twitter_account'])."', ftb_facebook_on_off='$ftb_facebook_on_off', ftb_youtube_on_off='$ftb_youtube_on_off', ftb_twitter_on_off='$ftb_twitter_on_off', ftb_feeds_on_off='$ftb_feeds_on_off', ftb_feeds_2_on_off='$ftb_feeds_2_on_off', ftb_message_too_users_on_off='$ftb_message_too_users_on_off', ftb_get_social_on_off='$ftb_get_social_on_off', ftb_show_avatar_on_off='$ftb_show_avatar_on_off', ftb_top_bottom='$ftb_top_bottom'");
    if (!$result) {
    redirect(FUSION_SELF.$aidlink."&status=nsu");
    } else {
    redirect(FUSION_SELF.$aidlink."&status=su");
    }
    }

    $floating_bar_settings = dbarray(dbquery("SELECT * FROM ".DB_FLOATINGBAR_TABLE));
    $facebook_name = stripinput($floating_bar_settings['facebook_name']);
	$facebook = stripinput($floating_bar_settings['facebook']);
    $youtube_name = stripinput($floating_bar_settings['youtube_name']);
	$youtube = stripinput($floating_bar_settings['youtube']);
    $twitter_name = stripinput($floating_bar_settings['twitter_name']);
	$twitter = stripinput($floating_bar_settings['twitter']);
    $feeds_name = stripinput($floating_bar_settings['feeds_name']);
    $feeds = stripinput($floating_bar_settings['feeds']);
	$feeds_name_2 = stripinput($floating_bar_settings['feeds_name_2']);
    $feeds_2 = stripinput($floating_bar_settings['feeds_2']);
	$message_too_users = stripinput($floating_bar_settings['message_too_users']);
	$ftb_theme = stripinput($floating_bar_settings['ftb_theme']);
	$ftb_google_1 = stripinput($floating_bar_settings['ftb_google_1']);
	$ftb_facebook_like = stripinput($floating_bar_settings['ftb_facebook_like']);
	$ftb_twitter_follow = stripinput($floating_bar_settings['ftb_twitter_follow']);
	$ftb_social_sharing = stripinput($floating_bar_settings['ftb_social_sharing']);
	$ftb_twitter_account = stripinput($floating_bar_settings['ftb_twitter_account']);
	

    add_to_title($locale['global_200'].$locale['ftb001']);

    echo "<form name='ftb_form' method='post' action='".FUSION_SELF.$aidlink."'>\n";

    echo "<div align='center' class='tbl2'>".$locale['ftb008']."</div>";

    echo "<table cellpadding='0' cellspacing='0' width='80%' align='center'  class='tbl-border' >\n<tr>\n";

    // facebook
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb003']."</td>\n";
    echo "<td align='right' class='tbl'><input class='textbox' maxlength='32' name='facebook_name' value='".$floating_bar_settings['facebook_name']."' />&nbsp;&nbsp;&nbsp;<input class='textbox' maxlength='32' name='facebook' value='".$floating_bar_settings['facebook']."' /></td>\n";
    echo "</tr><tr>\n";

    // youtube
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb004']."</td>\n";
    echo "<td align='right' class='tbl'><input class='textbox' maxlength='32' name='youtube_name' value='".$floating_bar_settings['youtube_name']."' />&nbsp;&nbsp;&nbsp;<input class='textbox' maxlength='32' name='youtube' value='".$floating_bar_settings['youtube']."' /></div></td>\n";
    echo "</tr><tr>\n";

    // twitter
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb005']."</td>\n";
    echo "<td align='right' class='tbl'><input class='textbox' maxlength='32' name='twitter_name' value='".$floating_bar_settings['twitter_name']."' />&nbsp;&nbsp;&nbsp;<input class='textbox' maxlength='32' name='twitter' value='".$floating_bar_settings['twitter']."' /></td>\n";
    echo "</tr><tr>\n";
	
	// twitter-name
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb061']."</td>\n";
    echo "<td align='right' class='tbl'><input class='textbox' maxlength='32' name='ftb_twitter_account' value='".$floating_bar_settings['ftb_twitter_account']."' /></td>\n";
    echo "</tr><tr>\n";

	// feeds
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb006']."</td>\n";
    echo "<td align='right' class='tbl'><input class='textbox' maxlength='32' name='feeds_name' value='".$floating_bar_settings['feeds_name']."' />&nbsp;&nbsp;&nbsp;<input class='textbox' maxlength='32' name='feeds' value='".$floating_bar_settings['feeds']."' /></td>\n";
    echo "</tr><tr>\n";
   
    // feeds 2
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb028']."</td>\n";
    echo" <td align='right' class='tbl'><input class='textbox' maxlength='32' name='feeds_name_2' value='".$floating_bar_settings['feeds_name_2']."' />&nbsp;&nbsp;&nbsp;<input class='textbox' maxlength='32' name='feeds_2' value='".$floating_bar_settings['feeds_2']."' /></td>\n";
    echo "</tr></tr></table><br />\n";
   
    echo "<table cellpadding='0' cellspacing='0' width='80%' align='center'  class='tbl-border' >\n<tr>\n";
    
    echo "<div align='center' class='tbl2'>".$locale['ftb016']."</div>";
    
    

    // Get Social on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb015']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_get_social_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_get_social_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_get_social_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td><tr>\n";
    
    // facebook on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb003']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_facebook_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_facebook_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_facebook_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
    
    // youtube on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb004']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_youtube_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_youtube_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_youtube_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";

    // twitter on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb005']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_twitter_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_twitter_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_twitter_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
   
	// feeds on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb006']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_feeds_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_feeds_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_feeds_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
   
    // feeds 2 on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb028']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_feeds_2_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_feeds_2_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_feeds_2_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr></tr></table><br />\n";
	
	
	echo "<table cellpadding='0' cellspacing='0' width='80%' align='center'  class='tbl-border' >\n<tr>\n";
    
    echo "<div align='center' class='tbl2'>".$locale['ftb018']."</div>";
    
    

    // show	Avatar on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb017']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_show_avatar_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_show_avatar_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_show_avatar_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td><tr>\n";
    
	// message too users on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb019']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_message_too_users_on_off' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_message_too_users_on_off'] == "1" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_message_too_users_on_off'] == "0" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
   
	// Theme
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb045']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_theme' class='textbox'>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_theme'] == "0" ? " selected='selected'" : "").">".$locale['ftb046']."</option>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_theme'] == "1" ? " selected='selected'" : "").">".$locale['ftb047']."</option>\n";
	echo "<option value='2'".($floating_bar_settings['ftb_theme'] == "2" ? " selected='selected'" : "").">".$locale['ftb048']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
	
	// Social sharing
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb060']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_social_sharing' class='textbox'>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_social_sharing'] == "0" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_social_sharing'] == "1" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
	
	// Google +1
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb051']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_google_1' class='textbox'>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_google_1'] == "0" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_google_1'] == "1" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
	
	// Facebook Like
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb058']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_facebook_like' class='textbox'>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_facebook_like'] == "0" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_facebook_like'] == "1" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";

	// Twitter follow
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb059']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_twitter_follow' class='textbox'>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_twitter_follow'] == "0" ? " selected='selected'" : "").">".$locale['ftb009']."</option>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_twitter_follow'] == "1" ? " selected='selected'" : "").">".$locale['ftb010']."</option>\n";
    echo "</select>\n";
    echo "</td></tr><tr>\n";
   
    // feeds on/ off
    echo "<td class='tbl' align='left' valign='top'>".$locale['ftb020']."</td>\n";
    echo "<td class='tbl' align='right'><select name='ftb_top_bottom' class='textbox'>\n";
    echo "<option value='1'".($floating_bar_settings['ftb_top_bottom'] == "1" ? " selected='selected'" : "").">".$locale['ftb021']."</option>\n";
    echo "<option value='0'".($floating_bar_settings['ftb_top_bottom'] == "0" ? " selected='selected'" : "").">".$locale['ftb022']."</option>\n";
    echo "</select>\n";
    echo "</td></tr></tr></table><br />\n";

	
	echo "<table cellpadding='0' cellspacing='0' width='80%' align='center'  class='tbl-border' >\n<tr>\n";
    echo "<div align='center' class='tbl2'>".$locale['ftb024']."</div>";
	
	// Message too users
	echo "<center>";
	echo "<textarea name='message_too_users' rows='4' cols='44' class='textbox' style='width:300px;' />".$floating_bar_settings['message_too_users']."</textarea><br />";
	echo display_bbcodes("340px", "message_too_users", "ftb_form", "smiley|b|i|u|url|small|big")."\n";
	echo "</center>";
	echo "</td></tr></tr></table><br />\n";
	
	
	
    echo "<hr width='70%'><br />";
    
    echo "<div width='70%' align='center'><input type='submit' class='button' name='ftbs_save' value='".$locale['ftb007']."' />";
   
    echo "</div>\n";

    echo "</form>\n";
	
	

closetable();

require_once THEMES."templates/footer.php";
?>