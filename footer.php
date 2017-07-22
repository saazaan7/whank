<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whank
 */

?>

	</div><!-- #content -->
<?php do_action( 'whank_before_foter' ); ?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-mamin">
				<?php get_sidebar( 'footer' ); ?>
			</div>
			<div class="site-info">
				<div class="foooter-bottom">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'whank' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'whank' ), 'WordPress' );
					?></a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'whank' ), 'whank', '<a href="https://automattic.com/">Underscores.me</a>' );
					?>
				</div>
			</div><!-- .site-info -->
		</div> <!-- container -->
	</footer><!-- #colophon -->
	<?php do_action( 'whank_after_foter' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
