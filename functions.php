<?php

/*****
 * Add the following line to focus-pro's functions.php:
 * include_once( get_stylesheet_directory() . '/custom/functions.php' );
 *****/


//* Add custom CSS
function tx041cap_theme() {
	wp_enqueue_style( 'tx041cap', get_stylesheet_directory_uri() . '/custom/style.css', NULL, '0.1.0' );
}
add_action( 'wp_enqueue_scripts', 'tx041cap_theme' );


//* Only show front page news category
function tx041cap_show_only_frontpage_news( $query ) {

	if ( $query->is_main_query() && $query->is_home() ) {
		$query->set( 'cat', '4' );
	}

}
add_action( 'pre_get_posts', 'tx041cap_show_only_frontpage_news' );


//* Custom footer
function tx041cap_footer() {
	echo do_shortcode( '<div class="footer" style="text-align:center;">Links or references to individuals or companies does not constitute an endorsement of any information, product or service you may receive from such sources.</div>
		<br />
		<div class="creds"><p><a href="/contact/email?officer=it">Contact the webmaster</a> • <a href="http://stats.pingdom.com/swznn0xlijj2/372530" target="_blank">Website Stats</a> • [footer_loginout]<br />Copyright [footer_copyright] Civil Air Patrol</p></div>' );
}
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'tx041cap_footer' );


//* Remove the "Filed under" and "Tags" lines from home page posts
if ( !is_single() ) {
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
}
