<?php
/**
 * whank Theme Customizer
 *
 * @package whank
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whank_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'whank_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'whank_customize_partial_blogdescription',
		) );
	}

	// Header Options panel
	$wp_customize-> add_panel('whank_header_options',array(
		'capability'	=> 'edit_theme_options',
		'description'	=> esc_html__( 'All the header related options','whank' ),
		'priority'		=> 300,
		'title'			=> esc_html__( 'Whank Header Options','whank' ),
		));
	
	// Top bar
	$wp_customize-> add_section( 'whank_top_bar_section', array(
		'priority'		=> 1,
		'title'			=> esc_html__( 'Top bar On/Off','whank' ),
		'panel'			=> 'whank_header_options'
		));

	$wp_customize-> add_setting( 'whank_top_bar_on_off', array(
		'default'		=> 0,
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'whank_sanitize_checkbox',
		));

	$wp_customize-> add_control( 'whank_top_bar_on_off', array(
		'type'			=> 'checkbox',
		'label'			=> esc_html__( 'Enable top bar','whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_top_bar_on_off',
		) );

	// Top bar content allign
	$wp_customize-> add_setting( 'whank_topbar_content_allign', array(
		'default'		=> 'social_icon_left',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'whank_radio_sanitize'
		));
	$wp_customize-> add_control( 'whank_topbar_content_allign', array(
		'type'			=> 'radio',
		'label'			=> esc_html__( 'Choose the required option', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'choices'		=> array(
				'social_icon_left' => esc_html__( 'Social icons on left' ),
				'contact_info_left'=> esc_html__( 'Contact informations on left', 'whank' ),
			),
		'setting'		=> 'whank_topbar_content_allign',
		));

	// Top bar content options
	$wp_customize-> add_setting( 'whank_topbar_information_icon_one', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_icon_one', array(
		'label'			=> esc_html__( 'Please type icon Class for First Option ', 'whank' ),
		'description'	=> __( 'Please refer <a href="http://fontawesome.io/icons/" target="_blank">HERE</a>', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_icon_one',
		));
	$wp_customize-> add_setting( 'whank_topbar_information_content_one', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_content_one', array(
		'label'			=> esc_html__( 'Please type informations for First Option ', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_content_one',
		));

	$wp_customize-> add_setting( 'whank_topbar_information_icon_two', array(
		'default'		=> '',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_icon_two', array(
		'label'			=> esc_html__( 'Please type icon Class for Second Option ', 'whank' ),
		'description'	=> __( 'Please refer <a href="http://fontawesome.io/icons/" target="_blank">HERE</a>', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_icon_two',
		));
	$wp_customize-> add_setting( 'whank_topbar_information_content_two', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_content_two', array(
		'label'			=> esc_html__( 'Please type informations for Second Option ', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_content_two',
		));

	$wp_customize-> add_setting( 'whank_topbar_information_icon_three', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_icon_three', array(
		'label'			=> esc_html__( 'Please type icon Class for Third Option ', 'whank' ),
		'description'	=> __( 'Please refer <a href="http://fontawesome.io/icons/" target="_blank">HERE</a>', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_icon_three',
		));
	$wp_customize-> add_setting( 'whank_topbar_information_content_three', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses', //https://divpusher.com/blog/wordpress-customizer-sanitization-examples#text		
		) );
	$wp_customize-> add_control( 'whank_topbar_information_content_three', array(
		'label'			=> esc_html__( 'Please type informations for Third Option ', 'whank' ),
		'section'		=> 'whank_top_bar_section',
		'setting'		=> 'whank_topbar_information_content_three',
		));

	// Header image position option
   $wp_customize->add_section('whank_header_media_position_section', array(
      'priority' => 3,
      'title' => esc_html__('Header Image Position', 'whank'),
      'panel' => 'whank_header_options'
   ));

   $wp_customize->add_setting( 'whank_header_media_position', array(
      'default' => 'position_two',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'whank_radio_sanitize'
   ));

   $wp_customize->add_control('whank_header_media_position', array(
      'type' => 'radio',
      'label' => esc_html__('Choose header media display position.','whank'),
      'section' => 'whank_header_media_position_section',
      'choices' => array(
         'position_one' => esc_html__( 'Display the Header media just above the site title/text.', 'whank' ),
         'position_two' => esc_html__( 'Display the Header media between site title/text and the main/primary menu.(Default)', 'whank' ),
         'position_three' => esc_html__( 'Display the Header image below main/primary menu.', 'whank' )
      )
   ));


	/******************************************************************/
	//Sanitization Functions
	// Checkbox senitization
	function whank_sanitize_checkbox( $input )
	{
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	// Radio sanitization
	function whank_radio_sanitize( $input, $setting ){
		//Ensure the input is slug
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id)->choices;

		// If the input is a valid key then return it; otherwise default.
		return( array_key_exists( $input, $choices) ? $input: $setting->default );
	}
}
add_action( 'customize_register', 'whank_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function whank_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function whank_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whank_customize_preview_js() {
	wp_enqueue_script( 'whank-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'whank_customize_preview_js' );
