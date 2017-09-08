<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whank
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whank' ); ?></a>

	<header id="masthead" class="site-header">
		<?php
		if (get_theme_mod( 'whank_top_bar_on_off' ) == 1) { ?>
			<div class="top-header">
		    	<div class="container-fluid">
		    		<?php
		    		$topbar = 'left';
		    		$topinfo = 'right';
		    		if (get_theme_mod('whank_topbar_content_allign','social_icon_left' )!='social_icon_left') {
		    			$topbar = 'right';
		    			$topinfo = 'left';
		    		} ?>
			      	<div class="top-icon <?php echo( esc_attr__($topbar)); ?>">
			        	<?php
			        	wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu', 'fallback_cb' => false, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'depth' => 1,) );?>
					</div>
			      	<div class="top-contact <?php echo( esc_attr__($topinfo)); ?>">
			        <?php
			        	echo whank_top_header_information();
			        ?>
					</div>
		    	</div>
			</div> <!-- top header -->
		<?php 
		}

		if ( get_theme_mod( 'whank_header_media_position','position_two' )=='position_one' ) {
			echo whank_header_media_render();
		}
		?>

		<div class="branding container">
			<div class="col-md-4 col-sm-12">
				<div class="site-branding">
					<div class="site-logo left">
						<?php the_custom_logo(); ?>
					</div>
					<div class="title-header left">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div> <!-- .site-title -->
				</div> <!-- .site-branding --> 
			</div>
			<div class="col-md-8 col-sm-12">
				<div class="header-sidebar">
					<?php
					if ( is_active_sidebar( 'whank_header_sidebar_1' )) {
						if ( !dynamic_sidebar( 'whank_header_sidebar_1' )) :
						endif;
					}
					?>
				</div>
			</div>
		</div> <!-- branding -->
		<?php
		if ( get_theme_mod( 'whank_header_media_position','position_two' )=='position_two' ) {
	      	whank_header_media_render();
	      }
		?>
		<nav id="site-navigation" class="main-navigation navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			          <span class="icon-bar"></span>
			          <span class="icon-bar"></span>
			          <span class="icon-bar"></span> 
			        </button>
			    </div>
				<div class="collapse navbar-collapse" id="myNavbar">
				<?php
					wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'container'         => false,
		                'container_class'   => 'collapse navbar-collapse',
		                'container_id'      => 'myNavbar',
		                'menu_id'	=>	'primary',
						'menu_class' => 'nav navbar-nav center',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                		'walker'            => new WP_Bootstrap_Navwalker(),
		            ) );
				?>	
				</div>
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'whank' ); ?></button> -->
			</div>
		</nav><!-- #site-navigation -->
		<?php
		if ( get_theme_mod( 'whank_header_media_position','position_two' )=='position_three' ) {
	      	whank_header_media_render();
	      }
		?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
