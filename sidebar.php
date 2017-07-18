<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whank
 */
?>

<div id="secondary" class="widget-area secondary col-md-4"">
	<?php do_action( 'whank_before_sidebar' ); 
	if ( ! dynamic_sidebar( 'whank_right_sidebar' ) ) :

		the_widget( 'WP_Widget_Text',
            array(
               'title'  => __( 'Example Widget', 'himalayas' ),
               'text'   => sprintf( __( 'This is an example widget to show how the Left Sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets are added then this will be replaced by those widgets.', 'himalayas' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
               'filter' => true,
            ),
            array(
               'before_widget' => '<aside class="widget widget_text clearfix">',
               'after_widget'  => '</aside>',
               'before_title'  => '<h3 class="widget-title"><span>',
               'after_title'   => '</span></h3>'
            )
        );
	endif;
		
	do_action( 'himalayas_after_sidebar' ); ?>
</div><!-- #secondary -->
