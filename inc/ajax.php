<?php
/*
@package Whank
Author : Sajan Joshi
==============
Ajax functions
==============

*/
add_action( 'wp_ajax_nopriv_whank_load_more', 'whank_load_more' );
add_action( 'wp_ajax_whank_load_more', 'whank_load_more' );

function whank_load_more(){
	// load more post
	$paged = $_POST["page"]+1;

	$query = new WP_Query( array(
		'post_type'	=> 'post',
		'paged'		=> $paged
		));

	while ( $query -> have_posts() ) : $query -> the_post();

		get_template_part( 'template-parts/content', get_post_format() );

	endwhile;

	wp_reset_postdata();
	
	die();
}