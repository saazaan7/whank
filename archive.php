<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whank
 */

get_header(); ?>

	<?php do_action( 'whank_before_body_content' ); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main">
			<div class="container-fluid">
	    		<div class="row">
	    		<div class="archive page">
	    		
	    		<?php
				if ( have_posts() ) : ?>

					<header class="page-header page-title text-center">
						<?php
							the_archive_title( '<h2 class="page-title">', '</h2>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<div class="">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; 
					get_template_part( 'navigation', 'none');
					?>
					</div>
					<?php
					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div> <!-- archive page div end -->
				</div> <!-- row end -->
			</div> <!-- container-fluid -->	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
do_action( 'whank_before_body_content' );
get_footer();
