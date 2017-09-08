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

/*
* function to render header video and image
*/
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

/*
*
* function to render top header informations
*
*/
 if ( !function_exists( 'whank_top_header_information') ) :
 	/**
 * Content for Top Header Section's info.
 *
 * @since Whank 1.0
 */
 	function whank_top_header_information(){
 		$first_icon		= get_theme_mod( 'whank_topbar_information_icon_one' );
 		$first_info		= get_theme_mod( 'whank_topbar_information_content_one' );
 		$second_icon	= get_theme_mod( 'whank_topbar_information_icon_two' );
 		$second_info 	= get_theme_mod( 'whank_topbar_information_content_two' );
 		$third_icon		= get_theme_mod( 'whank_topbar_information_icon_three' );
 		$third_info 	= get_theme_mod( 'whank_topbar_information_content_three' );
 		$output			= '';
 		if ( !empty(($first_icon)&&($first_info))||(($second_icon)&&($second_info))||(($third_info)&&($third_info)) ) {
 			$output		= '<ul class="contact-info">
							<li><span><i class="fa fa-' . esc_attr( $first_icon ) .' "></i></span>' . esc_html__( $first_info,'whank' ) . '</li>
							<li><span><i class="fa fa-' . esc_attr( $second_icon ) . ' "></i></span>' . esc_html__( $second_info,'whank' ) . '</li>
							<li><span><i class="fa fa-' . esc_attr( $third_icon ) . ' "></i></span>' . esc_html__( $third_info,'whank' ) . '</li>
						</ul>';
 		}
 		return $output;
 	}
endif;

/**
 * Returns a "Continue Reading" link for excerpts
 */
function whank_continue_reading() {
	return '';
}
add_filter( 'excerpt_more', 'whank_continue_reading' );

if ( ! function_exists( 'whank_excerpt_length' ) ) :
/**
 * Whank Excerpt Length
 *
 * @since Whank 1.0
 */
function whank_excerpt_length( $length ) {
	return 25;
}
endif;
add_filter( 'excerpt_length', 'whank_excerpt_length' );

