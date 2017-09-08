<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whank
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'whank_before_post_content' ); ?>
		<div class="entry-content">
		<header class="entry-header post-title text-center">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php whank_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="cat-names">
			<?php whank_entry_footer(); ?>
			</div><!-- .entry-footer -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
		<?php 
		if( has_post_thumbnail() ) : ?>
			<div class="post-image">
				<?php the_post_thumbnail( 'whank-featured-post' ); ?>
			</div>
		<?php endif; ?>

		<div class="entry-content post-content text-center">

			<?php 
				if ( is_singular() ) : ?>
					<?php the_content(); ?>
				<?php else: ?>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink( $post->ID );  ?>"> <?php echo( get_theme_mod( 'whank_read_more_button', __( 'Continue reading', 'whank' ) )); ?> -></a>
				<?php endif; 

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whank' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		</div> <!-- /entry content -->
	<?php do_action( 'whank_after_post_content' ); ?>
	</article><!-- #post-<?php the_ID(); ?> -->