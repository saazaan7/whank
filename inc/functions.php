<?php
/**
 * Additional Functions of the Theme
 *
 * This is the template that contains the additional functions for different options
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whank
 */

// Header functions

if ( ! function_exists( 'whank_header_media_render' ) ) :

	function whank_header_media_render(){
		$output = '';
		$header_media = esc_url( the_custom_header_markup() );
		if ( !empty( $header_media )) {
			$output = '<div class="container-fluid custom-header-image>' . $header_media . '</div>';
		}
		return $output;
	}
endif;
