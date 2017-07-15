<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whank
 */

get_header(); ?>

	<?php do_action( 'whank_before_body_content' ); ?>

	<div id="" class="content-area">
		<main id="main" class="site-main">
			<div class="container-fluid">
	    		<div class="row">
	    		<div class="archive page">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif; ?>
				<div class="promary col-md-8">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; 
				get_template_part( 'navigation', 'none');
				?>
				</div>
				<?php
				

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				</div> <!-- primary -->
				</div>
			</div>
		</main><!-- #main -->
	</div>

<?php
get_sidebar();
do_action( 'whank_after_body_content' );
get_footer();
