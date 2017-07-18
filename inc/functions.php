<!-- Excerpt text -->
<?php
function whank_excerpt_text($value)
{
	global $post;
	return ' ';
}
add_filter( 'excerpt_more', 'whank_excerpt_text' );

/**
 * Register widget area.
 */
function whank_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'whank' ),
		'id'            => 'whank_right_sidebar',
		'description'   => esc_html__( 'Add widgets here for right sidebar.', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whank_widgets_init' );