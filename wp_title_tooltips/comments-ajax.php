<?php

/*
http://www.ll19.com/
*/

require_once ('../../../wp-config.php');
wp_wptooltips_list($table_prefix);

/*
comment list
*/
function wp_wptooltips_list($table_prefix) {
	global $wpdb;
	$relax_comment_count = 1;
	$apply_filters_comment_text;
	$wttt_glll = $_POST["glll"];
	$wttt_list_email = $_POST["email"];
	$sql = "SELECT comment_author_email, comment_author, comment_author_url, " . $table_prefix . "comments.comment_date, comment_ID, comment_post_ID, comment_content FROM " . $table_prefix . "comments LEFT OUTER JOIN " . $table_prefix . "posts ON (" . $table_prefix . "comments.comment_post_ID = " . $table_prefix . "posts.ID) WHERE " . $table_prefix . "comments.comment_post_ID = '" . $wttt_glll . "' AND comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 0, 10";
	$content = $wpdb->get_results($sql);

	echo "<h3>&nbsp;&nbsp;Recent Comments:</h3>";
	echo "<ol>";
	if (empty ($content)) {
		echo "<li class=\"reply\" onMouseOver=\"jQuery(this).css({background:'#FFFFFF', border:'1px solid #ECEEF0'})\"  onMouseOut=\"jQuery(this).css({background:'#FAFAFA', border:'1px solid #ECEEF0'})\">";
		echo "<div class=\"admincommentcount\">0_0</div>";
		$randNum = rand(0, 14);
		if (@ file_exists(TEMPLATEPATH . '/glll_wttt.php')) {
			echo wttt_get_avatar($wttt_list_email, 40, $default = get_stylesheet_directory_uri() . '/nomail/nomail' . $randNum . '.gif');
		} else {
			echo wttt_get_avatar($wttt_list_email, 40, $default = WP_PLUGIN_URL . '/wp_title_tooltips/nomail/nomail' . $randNum . '.gif');
		}
		echo "<cite>Admin</cite>";
		echo "<small class=\"commentmetadata\">No Comment</small>";
		echo "<div>";
		echo "For the moment,No Comment~";
		echo "</div>";
		echo "</li>";
	} else {
		global $comment;
		foreach ($content as $comment)
			: $liclass = "<li class=\"reply\" onMouseOver=\"jQuery(this).css({background:'#FFFFFF', border:'1px solid #ECEEF0'})\"  onMouseOut=\"jQuery(this).css({background:'#FAFAFA', border:'1px solid #ECEEF0'})\"";
		if ($comment->comment_author_email == $wttt_list_email) {
			$liclass = "<li class=\"adminreply\"";
		}
		echo $liclass;
		$wtttPCId = $comment->comment_post_ID . "-" . $comment->comment_ID;
		echo " id=\"wttt-" . $wtttPCId . "\">";
		$countclass = "<div class=\"commentcount\">";
		if ($comment->comment_author_email == $wttt_list_email) {
			$countclass = "<div class=\"admincommentcount\">";
		}
		echo $countclass;
		echo $relax_comment_count;
		echo "</div>";
		$randNum = rand(0, 14);
		if (@ file_exists(TEMPLATEPATH . '/glll_wttt.php')) {
			echo wttt_get_avatar($comment->comment_author_email, 40, $default = get_stylesheet_directory_uri() . '/nomail/nomail' . $randNum . '.gif');
		} else {
			echo wttt_get_avatar($comment->comment_author_email, 40, $default = WP_PLUGIN_URL . '/wp_title_tooltips/nomail/nomail' . $randNum . '.gif');
		}
		echo "<cite>";
		if (empty ($comment->comment_author_url)) {
			echo $comment->comment_author;
		} else {
			echo "<a target=\"_blank\" href=\"" . $comment->comment_author_url . "\">" . $comment->comment_author . "</a>";
		}
		echo "</cite>";
		echo "<small class=\"commentmetadata\">";
		$wtttdata = ($comment->comment_date) . " : " . $wtttPCId;
		echo $wtttdata;
		echo "</small>";
		echo "<div>";
		$apply_filters_comment_text = apply_filters('comment_text', $comment->comment_content);
		if (empty ($apply_filters_comment_text)) $apply_filters_comment_text = $comment->comment_content;
		echo $apply_filters_comment_text;
		echo "</div>";
		$relax_comment_count++;
		echo "</li>";
		endforeach;
	}
	echo "</ol>";
}
/*
get gravatar
*/
function wttt_get_avatar($email, $size = '40', $default = '') {
	if (!is_numeric($size))
		$size = '40';
	if (empty ($email))
		$default = "http://www.gravatar.com/avatar/?d=$default&amp;s={$size}";
	if (!empty ($email)) {
		$out = 'http://www.gravatar.com/avatar/';
		$out .= md5(strtolower($email));
		$out .= '?s=' . $size;
		$out .= '&amp;d=' . urlencode($default);
		$avatar = "<img alt='' src='{$out}' class='avatar avatar-{$size}' height='{$size}' width='{$size}' />";
	} else {
		$avatar = "<img alt='' src='{$default}' class='avatar avatar-{$size} avatar-default' height='{$size}' width='{$size}' />";
	}
	return $avatar;
}
?>
