<div id="optionsbar"<?php bpm_classic_get_options_class() ?>>
	<h3><?php bp_get_options_title() ?></h3>
	<?php do_action( 'bp_options_bar_before' ) ?>
	<?php if ( bp_has_options_avatar() ) : ?>
		<p class="avatar">
			<?php bp_get_options_avatar() ?>
		</p>

	<?php endif; ?>

	<ul id="options-nav"<?php bpm_classic_has_icons() ?>>
				<?php 
                    if(bp_is_my_profile()){
                        bp_get_options_nav();
                     }
                  else if(bp_is_user ())
                      bp_get_displayed_user_nav ();
                  else
                      bp_get_options_nav ();
              ?>
      <?php do_action("bpmag_after_options_nav");?>

                        
	</ul>
		
	<?php do_action( 'bp_options_bar_after' ) ?>
		
  <div class="clear"></div>
		
</div>