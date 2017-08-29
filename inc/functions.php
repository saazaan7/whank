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
function whank_topbar_allignment( ){
	$allignment = 'left' ;
	if (get_theme_mod( 'whank_topbar_content_allign', 'social_icon_left' )!='social_icon_left') {
		$allignment = 'right';
	}
	echo $allignment;
	echo "string";
}