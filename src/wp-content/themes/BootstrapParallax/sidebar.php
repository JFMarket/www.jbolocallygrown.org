<?php
/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        Bootstrap Parallax 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 2.3.1
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
        <div class="span3">
        <div id="widgets" class="well">
        
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('main-sidebar')) : ?>
            
                <div class="widget-title"><?php _e('In Archive', 'responsive'); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>

                <div class="widget-title"><?php _e('My Account', 'responsive'); ?></div>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>

            <?php endif; //end of main-sidebar ?>

        <?php responsive_widgets_end(); // after widgets hook ?>
    		</div><!-- end of #widgets -->
        </div> <!-- end of .span3 -->
    </div> <!-- end of .row -->
     </div> <!-- end of .container -->