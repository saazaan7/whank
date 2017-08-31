<?php

add_action( 'widgets_init', 'whank_widgets_init' );
/**
 * Register widget area.
 */
function whank_widgets_init() {
	register_sidebar( array(
		'name'            => esc_html__( 'Right Sidebar', 'whank' ),
		'id'              => 'whank_right_sidebar',
		'description'     => esc_html__( 'Shows widgets at Right side.', 'whank' ),
		'before_widget'   => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'    => '</aside>',
		'before_title'    => '<h4 class="widget-title"><span>',
		'after_title'     => '</span></h4>'
	) );

	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 1','whank' ),
		'id'			=> 'whank_footer_sidebar_1',
		'description'	=> esc_html__( 'Add widgets here to show in footer', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 2','whank' ),
		'id'			=> 'whank_footer_sidebar_2',
		'description'	=> esc_html__( 'Add widgets here to show in footer', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 3','whank' ),
		'id'			=> 'whank_footer_sidebar_3',
		'description'	=> esc_html__( 'Add widgets here to show in footer', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 4','whank' ),
		'id'			=> 'whank_footer_sidebar_4',
		'description'	=> esc_html__( 'Add widgets here to show in footer', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Header Sidebar', 'whank' ),
		'id'			=> 'whank_header_sidebar_1',
		'description'	=> esc_html__( 'This will display in Header section' ),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
}
