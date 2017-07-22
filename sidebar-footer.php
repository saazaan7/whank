<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package TWhank
 * @since Spacious 1.0
 */

/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if( !is_active_sidebar( 'whank_footer_sidebar_1' ) &&
	!is_active_sidebar( 'whank_footer_sidebar_2' ) &&
	!is_active_sidebar( 'whank_footer_sidebar_3' ) &&
	!is_active_sidebar( 'whank_footer_sidebar_4' ) ) {
	return;
}
?>
<div class="footer-widgets-wrapper">
	<div class="container-fluid">
		<div class="footer-widgets-area clearfix">
			<div class="whank-footer col-md-3">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'whank_footer_sidebar_1' ) ):
				endif;
				?>
			</div>
			<div class="whank-footer col-md-3">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'whank_footer_sidebar_2' ) ):
				endif;
				?>
			</div>
			<div class="whank-footer col-md-3">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'whank_footer_sidebar_3' ) ):
				endif;
				?>
			</div>
			<div class="whank-footer last col-md-3">
				<?php
				// Calling the footer sidebar if it exists.
				if ( !dynamic_sidebar( 'whank_footer_sidebar_4' ) ):
				endif;
				?>
			</div>
		</div>
	</div>
</div>
