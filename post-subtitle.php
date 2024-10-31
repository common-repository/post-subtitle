<?
/*
Plugin Name: Post Subtitle
Plugin URI: http://johnluetke.net/software/wordpress/post_subtitle

Description: Unconventional, but aesthetic way for using subtitles with your posts.

Author: John Luetke
Author URI: http://johnluetke.net

Version: 1.1
*/
register_activation_hook( __FILE__, 'jl_post_subtitle_install');
register_deactivation_hook( __FILE__, 'jl_post_subtitle_uninstall');

add_action('edit_post_form_after_title', 'jl_post_subtitle_input');
add_action('save_post', 'jl_post_subtitle_save');

function jl_post_subtitle_install() {
	// As much I hated doing this, we need to modify a core Wordpress file.
	// Backup said file into the plugin directory, and insert our new one
	$original_file = ABSPATH . "wp-admin/edit-form-advanced.php";
	$new_file = dirname( __FILE__ ) . '/wp-admin/edit-form-advanced.php';

	// Backup the original.
	if (!copy($original_file, $new_file.".original")) 
	      wp_die( "Could not backup <span style='font-family: Courier New;'>".$orignal_file."</span>. Please ensure that the permissions on this file allow moving.");

	// Copy in the new file.
	if (!copy($new_file, $original_file)) 
	      wp_die( $old_file."<br />".$new_file);


}

function jl_post_subtitle_uninstall() {
	// As much I hated doing this, we need to modify a core Wordpress file.
	// Backup said file into the plugin directory, and insert our new one
	$new_file = ABSPATH . "wp-admin/edit-form-advanced.php";
	$original_file = dirname( __FILE__ ) . '/wp-admin/edit-form-advanced.php.original';

	if (!file_exists($new_file)) {
		wp_die("<strong>Post Subtitle:</strong> This shouldn't have happened. <span style='font-family: Courier New;'>".$new_file."</span> is missing.");
	}
	if (!file_exists($original_file)) {
		wp_die("<strong>Post Subtitle:</strong> Your original <span style='font-family: Courier New;'>edit-form-advanced.php</span> is missing from <span style='font-family: Courier New;'>".dirname($original_file)."/</span>. The plugin cannot be deactivated.");
	}

	// Restore the original file.
	if (!copy($original_file, $new_file)) 
	      wp_die( $original_file."<br />".$new_file);
};

function jl_post_subtitle_input () {
	echo "" .
	"<div id='subtitlewrap'>\n" .
	"\t<input type='text' name='jl_post_subtitle' size='30' tabindex='1' value='". esc_attr( htmlspecialchars( jl_post_subtitle_get($post_ID) ) ) ."' id='jl_post_subtitle' style='width: 100%;' autocomplete='off' />\n" .
	"</div>";
}

function jl_post_subtitle_save( $post_id ) {
	if (!current_user_can('edit_post', $post_id))
		return $post_id;

	if (!update_post_meta($post_id, "jl_post_subtitle", $_POST['jl_post_subtitle']))
		// key does not exist, so add a new one
		add_post_meta($post_id, "jl_post_subtitle", $_POST['jl_post_subtitle']);
}

function jl_post_subtitle_get($post_id) {
	return get_post_meta($post_id, "jl_post_subtitle", true);
}

function the_subtitle($before = "", $after = "") {
	global $post;
	get_the_subtitle($post->ID, $before, $after, true);
}

function get_the_subtitle($id, $before = "", $after = "", $display = true) {
	$subtitle = $before . jl_post_subtitle_get($id) . $after;
	if ($display)
		echo $subtitle;
	else
		return $subtitle;
}
?>
