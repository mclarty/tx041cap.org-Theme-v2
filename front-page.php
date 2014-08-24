<?php
/**
 * This file adds the Home Page to the Focus Pro Theme.
 *
 * @author StudioPress
 * @package Focus Pro
 * @subpackage Customizations
 */
 
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'focus_grid_loop_helper' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );

//* Add support for Genesis Grid Loop
function focus_grid_loop_helper() {

	if ( function_exists( 'genesis_grid_loop' ) ) {
		remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
		genesis_grid_loop( array(
			'features'              => 1,
			'feature_image_size'    => 'medium',
			'feature_content_limit' => 0,
			'grid_image_size'		=> 'home-grid-thumbnail',
			'grid_image_class'		=> 'alignnone',
			'grid_content_limit' 	=> 250,
			'more' 					=> __( '[Continue reading]', 'focus' ),
		) );
	}

	else {
		genesis_standard_loop();
	}

}

genesis();
