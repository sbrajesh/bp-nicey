<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

		<?php do_action( 'bp_head' ) ?>

		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
                <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>

	</head>

	<body <?php body_class() ?> id="bp-default">
		
		<div id="page"><!--page containr -->
		<?php do_action( 'bp_before_search_login_bar' ) ?>	
		
		<div id="search-login-bar">
                      
			<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
						<input type="text" id="search-terms" name="search-terms" value="" />
						<?php echo bp_search_form_type_select() ?>

						<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />
						<?php wp_nonce_field( 'bp_search_form' ) ?>
					</form><!-- #search-form -->

				

				<?php do_action( 'bp_search_login_bar' ) ?>
			<?php if ( !is_user_logged_in() ) : ?>
		
				<form name="login-form" id="login-form" action="<?php echo site_url( 'wp-login.php' ) ?>" method="post">
					<input type="text" name="log" id="user_login" value="<?php _e( 'Username', 'buddypress' ) ?>" onfocus="if (this.value == '<?php _e( 'Username', 'buddypress' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Username', 'buddypress' ) ?>';}" />
					<input type="password" name="pwd" id="user_pass" class="input" value="" />
			
					<input type="checkbox" name="rememberme" id="rememberme" value="forever" title="<?php _e( 'Remember Me', 'buddypress' ) ?>" />
			
					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e( 'Log In', 'buddypress' ) ?>"/>		
					
					<?php if ( bp_get_signup_allowed() ) : ?>		
						<input type="button" name="signup-submit" id="signup-submit" value="<?php _e( 'Sign Up', 'buddypress' ) ?>" onclick="location.href='<?php echo bp_signup_page() ?>'" />
					<?php endif; ?>
					
					<input type="hidden" name="redirect_to" value="<?php echo bp_root_domain() ?>" />
					<input type="hidden" name="testcookie" value="1" />
						
					<?php do_action( 'bp_login_bar_logged_out' ) ?>
				</form>
	
			<?php else : ?>
		
				<div id="logout-link">
					<?php bp_loggedin_user_avatar( 'width=20&height=20' ) ?> &nbsp; <?php echo bp_core_get_userlink(bp_loggedin_user_id()) ?> / <?php bpnicey_logout_link() ?>
					
					<?php do_action( 'bp_login_bar_logged_in' ) ?>
				</div>
		
			<?php endif; ?>
			
			<?php do_action( 'bp_search_login_bar' ) ?>

		</div>

		<?php do_action( 'bp_after_search_login_bar' ) ?>			
		<?php do_action( 'bp_before_header' ) ?>		

		<div id="header">	
		
			<h1 id="logo"><a href="<?php echo get_bloginfo('url') ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><!--<img src="<?php bloginfo('stylesheet_directory');?>/images/logo.gif" />--><?php bp_site_name() ?></a></h1>
			<?php do_action( 'bp_header' ) ?>
	
		</div>

		<?php do_action( 'bp_after_header' ) ?>
		
		
			<div id="menu">
			<div id="menu-l-corner">
			</div>		
				
				<?php wp_nav_menu(array('theme_location'=>'primary','menu'=>false,'container'=>false,'menu_class'=>'nav','menu_id'=>'nav'));?>

				
			
				<div id="menu-r-corner">
						</div>		
				<br class="clear"/>		
			</div>
		
		
		<?php do_action( 'bp_before_container' ) ?>
		
		<div id="container">
			
			