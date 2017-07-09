<!-- Excerpt text -->
<?php
function whank_excerpt_text($value)
{
	global $post;
	return ' ';
}
add_filter( 'excerpt_more', 'whank_excerpt_text' );
?>