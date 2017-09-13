<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package whank
 */

get_header(); ?>
	<?php do_action( 'whank_before_body_content' ); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main">
			<div class="container-fluid">
				<div class="row">
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
do_action( 'whank_before_body_content' );
get_footer();
