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
		<div class="top-header">
		    <div class="container-fluid">
		      <div class="top-icon">
		        <ul class="social-menu">
		          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
		          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
		          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
		          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
		        </ul>
		      </div>
		      <div class="top-contact">
		        <ul class="contact-info">
		          <li><span><i class="fa fa-map-marker"></i></span>New York, NY 928865, USA</li>
		          <li><span><i class="fa fa-phone"></i></span>+987-265945868</li>
		          <li><span><i class="fa fa-envelope"></i></span>info@themegrill.com</li>
		        </ul>
		      </div>
		    </div>
		</div> <!-- top header -->
		<div class="container-fluid custom-header-image">
	      <img class="img-responsive" src="images/hdslide1.jpg">
		</div>
		<!-- <div class="site-branding">
			<?php
			the_custom_logo();
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
		</div> .site-branding -->
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
					/*wp_nav_menu( array(
						'theme_location'	=>	'primary',
						'menu_id'	=>	'primary',
						'menu_class' => 'nav navbar-nav center'
						) );*/
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

		<!-- <nav class="navbar navbar-inverse">
		    <div class="container-fluid">
		      <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span> 
		        </button>
		        <span id="canvasnav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		      </div>
		      <div class="collapse navbar-collapse" id="myNavbar">
		        <ul class="nav navbar-nav center">
		          <li class="active"><a href="#">Home</a></li>
		          <li><a href="#">Page 1</a></li>
		          <li><a href="#">Page 2</a></li> 
		          <li><a href="#">Page 3</a></li> 
		        </ul>
		      </div>
		    </div>
		</nav> -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
