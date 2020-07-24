<?php
/**
 * SKT Meditation Theme Customizer
 *
 * @package SKT Meditation
 */
function skt_meditation_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_meditation_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'skt_meditation_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_meditation_custom_header_setup' );
if ( ! function_exists( 'skt_meditation_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_meditation_custom_header_setup().
 */
function skt_meditation_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_meditation_header_style 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_meditation_customize_register( $wp_customize ) {
	//Add a class for titles
    class skt_meditation_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#e3b26d',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-meditation'),			
			 'description'	=> esc_html__('More color options in PRO Version','skt-meditation'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'skt-meditation'),
            'priority' => null,
            'description'	=> esc_html__('Featured Image Size Should be ( 1400 X 743 ) More slider settings available in PRO Version','skt-meditation'),		
        )
    );
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_meditation_sanitize_integer'
	));
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','skt-meditation'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'skt_meditation_sanitize_integer'
	));
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','skt-meditation'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_meditation_sanitize_integer'
	));
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','skt-meditation'),
			'section'	=> 'slider_section'
	));	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'skt_meditation_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Uncheck To Show Slider','skt-meditation'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	 
	 
	// Home Section One
	$wp_customize->add_section('section_thumb_with_content', array(
		'title'	=> esc_html__('Home Section One','skt-meditation'),
		'description'	=> esc_html__('Select Page from the dropdown for section','skt-meditation'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('section1_title',array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section1_title',array(
			'label'	=> __('Add title for section title','skt-meditation'),
			'section'	=> 'section_thumb_with_content',
			'setting'	=> 'section1_title'
	));	
	
	$wp_customize->add_setting(
		'section1_centerimage',
		array(
			'sanitize_callback'	=> 'esc_url_raw',
			'transport'		=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'section1_centerimage',
			array(
				'settings'		=> 'section1_centerimage',
				'section'		=> 'section_thumb_with_content',
				'label'			=> __( 'Add Center Image', 'skt-meditation' ),
				'description'	=> __( 'Select the image to be used for Center Image.', 'skt-meditation' )
			)
		)
	);	
	
	$wp_customize->add_setting('sec-column-left1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-left1',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));	
	
	$wp_customize->add_setting('sec-column-right1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-right1',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));		
	
	$wp_customize->add_setting('sec-column-left2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-left2',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));		
	
	$wp_customize->add_setting('sec-column-right2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-right2',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));		
	
	$wp_customize->add_setting('sec-column-left3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-left3',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));	
	
	$wp_customize->add_setting('sec-column-right3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column-right3',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));		
	
	//Hide Section 	
	$wp_customize->add_setting('hide_home_secwith_content',array(
			'sanitize_callback' => 'skt_meditation_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_home_secwith_content', array(
    	   'section'   => 'section_thumb_with_content',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-meditation'),
    	   'type'      => 'checkbox'
     )); // Hide Section 	
	 
	// Home Section 2
	$wp_customize->add_section('section_two', array(
		'title'	=> esc_html__('Home Section Two','skt-meditation'),
		'priority'	=> null
	));	

	$wp_customize->add_setting('section2_title',array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section2_title',array(
			'label'	=> __('Add Title','skt-meditation'),
			'section'	=> 'section_two',
			'setting'	=> 'section2_title'
	));	 
	
	$wp_customize->add_setting('section2_button_text',array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section2_button_text',array(
			'label'	=> __('Add Button Text','skt-meditation'),
			'section'	=> 'section_two',
			'setting'	=> 'section2_button_text'
	));	
	
	$wp_customize->add_setting('section2_button_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('section2_button_link',array(
			'label'	=> __('Add Button Link','skt-meditation'),
			'section'	=> 'section_two',
			'setting'	=> 'section2_button_link'
	));		

	//Hide Section Two
	$wp_customize->add_setting('hide_section_two',array(
			'sanitize_callback' => 'skt_meditation_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_section_two', array(
    	   'section'   => 'section_two',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-meditation'),
    	   'type'      => 'checkbox'
     )); //Hide Section Two

	// Home Section 3 Boxes
	$wp_customize->add_section('section_three', array(
		'title'	=> esc_html__('Home Section Three','skt-meditation'),
		'description'	=> esc_html__('Select Page from the dropdown for homepage three boxes','skt-meditation'),
		'priority'	=> null
	));	

	$wp_customize->add_setting('section3_title',array(
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section3_title',array(
			'label'	=> __('Add title for section title','skt-meditation'),
			'section'	=> 'section_three',
			'setting'	=> 'section3_title'
	));		

	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_three',
	));	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_three',
	));
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_meditation_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_three',
	));
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagethreeboxes',array(
			'sanitize_callback' => 'skt_meditation_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_pagethreeboxes', array(
    	   'section'   => 'section_three',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-meditation'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section

	$wp_customize->add_section('footer_main',array(
			'title'	=> esc_html__('Footer Area','skt-meditation'),
			'description'	=> esc_html__('Manager Footer From Widgets >> Footer Column 1, Footer Column 2, Footer Column 3','skt-meditation'),			
			'priority'	=> null,
	));	
	
    $wp_customize->add_setting('skt_meditation_options[footer-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_meditation_Info( $wp_customize, 'footer_main', array(
        'section' => 'footer_main',
        'settings' => 'skt_meditation_options[footer-info]',
        'priority' => null
        ) )
    );  	
	
}
add_action( 'customize_register', 'skt_meditation_customize_register' );
//Integer
function skt_meditation_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function skt_meditation_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_meditation_custom_css() {
    wp_enqueue_style(
        'skt-meditation-custom-style',
        get_template_directory_uri() . '/css/skt-meditation-custom-style.css'
    );
        $color = get_theme_mod( 'color_scheme' ); //E.g. #e64d43
		$header_text_color = get_header_textcolor();
        $custom_css = "
					#sidebar ul li a:hover,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.logo h2 span,
					.fancy-title h2 span,
					.postmeta a:hover,
					.recent-post .morebtn:hover, .sitenav ul li a:hover, .sitenav ul li.current_page_item a, .sitenav ul li.menu-item-has-children.hover, .sitenav ul li.current-menu-parent a.parent, .left-fitbox a:hover h3, .right-fitbox a:hover h3, .tagcloud a
					{ 
						 color: {$color} !important;
					}
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.nivo-controlNav a.active,								
					.wpcf7 input[type='submit'],
					a.ReadMore,
					.slide_info .slide_more,
					.section2button,
					input.search-submit
					{ 
					   background-color: {$color} !important;
					}
					.titleborder span:after{border-bottom-color: {$color} !important;}
				";
        wp_add_inline_style( 'skt-meditation-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_meditation_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_meditation_customize_preview_js() {
	wp_enqueue_script( 'skt_meditation_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_meditation_customize_preview_js' );