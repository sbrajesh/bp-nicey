<?php
/*disbale custom header support*/
define( 'BP_DTHEME_DISABLE_CUSTOM_HEADER', true );
//if(!defined("BP_HOME_BLOG_SLUG"))
//define("BP_HOME_BLOG_SLUG","blog");

/* below code is ported from BP Mag classic theme */

//add_action("bpmag_after_header","bpm_classic_main_div",20);
add_action("bp_before_group_home_content","bpm_classic_main_div",20);//insise contents section
add_action("bp_before_group_plugin_template","bpm_classic_main_div",20);//insise contents section
add_action("bp_before_member_home_content","bpm_classic_main_div",20);//insise contents section
add_action("bp_before_member_plugin_template","bpm_classic_main_div",20);//insise contents section
function bpm_classic_main_div(){
  //if(!function_exists("bp_is_active"))
   //     return;
  // if(bp_is_directory ()||  bp_is_blog_page()||bp_is_page(BP_REGISTER_SLUG)||  bp_is_page(BP_ACTIVATION_SLUG))
     //  return;
       echo "<div id=\"wrap-all\">";
        locate_template(array("userbar.php"),true);
        locate_template(array("optionsbar.php"),true);
        echo "<div id=\"main\">";
        //add_action("bpmag_after_container","bpm_classic_close_div");
        add_action("bp_after_member_home_content","bpm_classic_close_div");
}

//close the #main div
function bpm_classic_close_div(){
    echo "<br class='clear' /></div><div class='clear'></div></div>";
}

//ported from member theme bp 1.0.x
function bpm_classic_get_options_class() {
	global $bp;

	if ( ( !bp_is_home() && $bp->current_component == $bp->profile->slug ) || ( !bp_is_home() && $bp->current_component == $bp->friends->slug ) || ( !bp_is_home() && $bp->current_component == $bp->blogs->slug ) ) {
		echo ' class="arrow"';
	}

	if ( ( $bp->current_component == $bp->groups->slug && $bp->is_single_item ) || ( $bp->current_component == $bp->groups->slug && !bp_is_home() ) )
		echo ' class="arrow"';
}

function bpm_classic_has_icons() {
	global $bp;

	if ( ( !bp_is_home() ) )
		echo ' class="icons"';
}
function bpm_classic_login_bar() {
	global $bp;

	if ( !is_user_logged_in() ) : ?>

		<form name="login-form" id="login-form" action="<?php echo site_url("wp-login.php","login"); ?>" method="post">
			<input type="text" name="log" id="user_login" value="<?php _e( 'Username', 'bpmag' ) ?>" onfocus="if (this.value == '<?php _e( 'Username', 'bpmag' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Username', 'bpmag' ) ?>';}" />
			<input type="password" name="pwd" id="user_pass" class="input" value="" />

			<input type="checkbox" name="rememberme" id="rememberme" value="forever" title="<?php _e( 'Remember Me', 'bpmag' ) ?>" />

			<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e( 'Log In', 'bpmag' ) ?>"/>
			<input type="button" name="signup-submit" id="signup-submit" value="<?php _e( 'Sign Up', 'bpmag' ) ?>" onclick="location.href='<?php echo bp_signup_page() ?>'" />

			<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>" />
			<input type="hidden" name="testcookie" value="1" />

			<?php do_action( 'bp_login_bar_logged_out' ) ?>
		</form>

	<?php else : ?>

		<div id="logout-link">
			<?php  bp_loggedin_user_avatar("type=thumb&height=20&width=20") ?> &nbsp;
			<?php bp_loggedinuser_link() ?>
			<?php
				if ( function_exists('wp_logout_url') ) {
					$logout_link = '/ <a href="' . wp_logout_url( $bp->root_domain ) . '">' . __( 'Log Out', 'bpmag' ) . '</a>';
				} else {
					$logout_link = '/ <a href="' . $bp->root_domain . '/wp-login.php?action=logout&amp;redirect_to=' . $bp->root_domain . '">' . __( 'Log Out', 'bpmag' ) . '</a>';
				}

				echo apply_filters( 'bp_logout_link', $logout_link );
			?>

			<?php do_action( 'bp_login_bar_logged_in' ) ?>
		</div>

	<?php endif;
}



///layout
//make suree parent theme does not apply resizing
//add filter on body_class to maintain the width on the pages where vertical nav is present
add_filter("body_class","bpmag_get_body_class",20);
function bpmag_get_body_class($classes){
if(bp_is_directory ()||  bp_is_blog_page()||bp_is_page(BP_REGISTER_SLUG)||  bp_is_page(BP_ACTIVATION_SLUG))
return $classes;
else
    $classes[]="column-component";
if(bp_is_home ())
    $classes[]="self-profile-view";
return $classes;


}
?>