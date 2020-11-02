<?php
/**
 * VW Tour Lite Theme Customizer
 *
 * @package VW Tour Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_tour_lite_custom_controls() {
    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_tour_lite_custom_controls' );

function vw_tour_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_tour_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_tour_lite_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWTourLiteParentPanel = new VW_Tour_Lite_WP_Customize_Panel( $wp_customize, 'vw_tour_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	//Layouts
	$wp_customize->add_section( 'vw_tour_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-tour-lite' ),
		'priority'   => 30,
		'panel' => 'vw_tour_lite_panel_id'
	) );

	// Width 
    $wp_customize->add_setting('vw_tour_lite_width_option',array(
        'default' => __('Full Width','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Tour_Lite_Image_Radio_Control($wp_customize, 'vw_tour_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-tour-lite'),
        'description' => __('Here you can change the width layout of Website. ','vw-tour-lite'),
        'section' => 'vw_tour_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/box-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_tour_lite_theme_options',array(
        'default' => __('Right Sidebar','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));

	$wp_customize->add_control('vw_tour_lite_theme_options',array(
        'type' => 'select',
        'label' => __( 'Post Sidebar Layout', 'vw-tour-lite' ),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-tour-lite'),
        'section' => 'vw_tour_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-tour-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-tour-lite'),
            'One Column' => __('One Column','vw-tour-lite'),
            'Three Columns' => __('Three Columns','vw-tour-lite'),
            'Four Columns' => __('Four Columns','vw-tour-lite'),
            'Grid Layout' => __('Grid Layout','vw-tour-lite')
        ),
	));

    // Page layout
    $wp_customize->add_setting('vw_tour_lite_page_layout',array(
        'default' => __('One Column','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_tour_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-tour-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-tour-lite'),
        'section' => 'vw_tour_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-tour-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-tour-lite'),
            'One Column' => __('One Column','vw-tour-lite')
        ),
	));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_tour_lite_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-tour-lite' ),
        'section' => 'vw_tour_lite_left_right'
    )));

	$wp_customize->add_setting('vw_tour_lite_loader_icon',array(
        'default' => __('Two Way','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_tour_lite_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-tour-lite'),
        'section' => 'vw_tour_lite_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-tour-lite'),
            'Dots' => __('Dots','vw-tour-lite'),
            'Rotate' => __('Rotate','vw-tour-lite')
        ),
	) );

	//Topbar Contact
	$wp_customize->add_section('vw_tour_lite_headercont_section',array(
		'title'	=> __('Topbar Contact','vw-tour-lite'),
		'description'	=> __('Add topbar contact details here','vw-tour-lite'),
		'priority'	=> null,
		'panel' => 'vw_tour_lite_panel_id'
	));

	$wp_customize->add_setting( 'vw_tour_lite_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-tour-lite' ),
      'section' => 'vw_tour_lite_headercont_section'
    )));

    $wp_customize->add_setting('vw_tour_lite_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_headercont_section',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_tour_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-tour-lite' ),
        'section' => 'vw_tour_lite_headercont_section'
    )));

    $wp_customize->add_setting('vw_tour_lite_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_headercont_section',
		'type'=> 'text'
	));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_cont_phone', array( 
		'selector' => '.top-bar i', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_cont_phone', 
	));

    $wp_customize->add_setting('vw_tour_lite_cont_phone_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_cont_phone_icon',array(
		'label'	=> __('Add Contact Number Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_headercont_section',
		'setting'	=> 'vw_tour_lite_cont_phone_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_tour_lite_cont_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_phone_number'
	));
	
	$wp_customize->add_control('vw_tour_lite_cont_phone',array(
		'label'	=> __('Add Contact Number','vw-tour-lite'),
		'section'	=> 'vw_tour_lite_headercont_section',
		'setting'	=> 'vw_tour_lite_cont_phone',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_cont_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_cont_email_icon',array(
		'label'	=> __('Add Email address Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_headercont_section',
		'setting'	=> 'vw_tour_lite_cont_email_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_tour_lite_cont_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_email'
	));
	
	$wp_customize->add_control('vw_tour_lite_cont_email',array(
		'label'	=> __('Add Email address here','vw-tour-lite'),
		'section'	=> 'vw_tour_lite_headercont_section',
		'setting'	=> 'vw_tour_lite_cont_email',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'vw_tour_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-tour-lite' ),
		'priority'   => null,
		'panel' => 'vw_tour_lite_panel_id'
	) );

	$wp_customize->add_setting( 'vw_tour_lite_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-tour-lite' ),
      'section' => 'vw_tour_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_tour_lite_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_tour_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_tour_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_tour_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-tour-lite' ),
			'description' => __('Slider image size (1500 x 600)','vw-tour-lite'),
			'section'  => 'vw_tour_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_tour_lite_slider_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_slidersettings',
		'setting'	=> 'vw_tour_lite_slider_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_tour_lite_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_slidersettings',
		'type'=> 'text'
	));

	//Slider Content Layouts
	$wp_customize->add_setting('vw_tour_lite_slider_content_option',array(
       'default' => __('Center','vw-tour-lite'),
       'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));

	$wp_customize->add_control(new VW_Tour_Lite_Image_Radio_Control($wp_customize, 'vw_tour_lite_slider_content_option', array(
       'type' => 'select',
       'label' => __('Slider Content Layouts','vw-tour-lite'),
       'section' => 'vw_tour_lite_slidersettings',
       'choices' => array(
           'Left' => get_template_directory_uri().'/images/left.png',
           'Center' => get_template_directory_uri().'/images/center.png',
           'Right' => get_template_directory_uri().'/images/right.png'
	))));

	//Excerpt
	$wp_customize->add_setting( 'vw_tour_lite_excerpt_number1', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_excerpt_number1', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_tour_lite_excerpt_number1',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_tour_lite_slider_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_tour_lite_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_tour_lite_slider_opacity_color',
		'choices' => array(
           '0' =>  esc_attr('0','vw-tour-lite'),
           '0.1' =>  esc_attr('0.1','vw-tour-lite'),
           '0.2' =>  esc_attr('0.2','vw-tour-lite'),
           '0.3' =>  esc_attr('0.3','vw-tour-lite'),
           '0.4' =>  esc_attr('0.4','vw-tour-lite'),
           '0.5' =>  esc_attr('0.5','vw-tour-lite'),
           '0.6' =>  esc_attr('0.6','vw-tour-lite'),
           '0.7' =>  esc_attr('0.7','vw-tour-lite'),
           '0.8' =>  esc_attr('0.8','vw-tour-lite'),
           '0.9' =>  esc_attr('0.9','vw-tour-lite')
	),
	) );

	//Slider height
	$wp_customize->add_setting('vw_tour_lite_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_slider_height',array(
		'label'	=> __('Slider Height','vw-tour-lite'),
		'description'	=> __('Specify the slider height (px).','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_slidersettings',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_tour_lite_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_tour_lite_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-tour-lite'),
		'section' => 'vw_tour_lite_slidersettings',
		'type'  => 'number',
	) );

	//Why Choose Us Section
	$wp_customize->add_section('vw_tour_lite_our_services',array(
		'title'	=> __('Why Choose Us Section','vw-tour-lite'),
		'description'=> __('This section will appear below the slider.','vw-tour-lite'),
		'panel' => 'vw_tour_lite_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_tour_lite_sec1_title', array( 
		'selector' => '#our-services h2', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_sec1_title',
	));
	
	$wp_customize->add_setting('vw_tour_lite_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_tour_lite_sec1_title',array(
		'label'	=> __('Section Title','vw-tour-lite'),
		'section'=> 'vw_tour_lite_our_services',
		'setting'=> 'vw_tour_lite_sec1_title',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 2; $count++ ) {
		$wp_customize->add_setting( 'vw_tour_lite_servicesettings' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_tour_lite_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_tour_lite_servicesettings' . $count, array(
			'label'    => __( 'Select Service Page', 'vw-tour-lite' ),
			'description' => __('Image size (150 x 150)','vw-tour-lite'),
			'section'  => 'vw_tour_lite_our_services',
			'type'     => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting( 'vw_tour_lite_excerpt_number2', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_excerpt_number2', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_our_services',
		'type'        => 'range',
		'settings'    => 'vw_tour_lite_excerpt_number2',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWTourLiteParentPanel );

	$BlogPostParentPanel = new VW_Tour_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-tour-lite' ),
		'panel' => 'vw_tour_lite_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_tour_lite_post_settings', array(
		'title' => __( 'Post Settings', 'vw-tour-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_toggle_postdate', array( 
		'selector' => '.services-box h2 a', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_tour_lite_toggle_postdate',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_toggle_postdate', array(
		'label' => esc_html__( 'Post Date','vw-tour-lite' ),
		'section' => 'vw_tour_lite_post_settings'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_toggle_author', array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_toggle_author',array(
		'label' => esc_html__( 'Author','vw-tour-lite' ),
		'section' => 'vw_tour_lite_post_settings'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-tour-lite' ),
		'section' => 'vw_tour_lite_post_settings'
   	)));

    $wp_customize->add_setting( 'vw_tour_lite_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_tour_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
	$wp_customize->add_setting('vw_tour_lite_blog_layout_option',array(
        'default' => __('Default','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Tour_Lite_Image_Radio_Control($wp_customize, 'vw_tour_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-tour-lite'),
        'section' => 'vw_tour_lite_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_tour_lite_excerpt_settings',array(
        'default' => __('Excerpt','vw-tour-lite'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_tour_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-tour-lite'),
        'section' => 'vw_tour_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-tour-lite'),
            'Excerpt' => __('Excerpt','vw-tour-lite'),
            'No Content' => __('No Content','vw-tour-lite')
        ),
	) );

	$wp_customize->add_setting('vw_tour_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_tour_lite_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-tour-lite' ),
      'section' => 'vw_tour_lite_post_settings'
    )));

	$wp_customize->add_setting( 'vw_tour_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_tour_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_tour_lite_blog_pagination_type', array(
        'section' => 'vw_tour_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-tour-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-tour-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-tour-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_tour_lite_button_settings', array(
		'title' => __( 'Button Settings', 'vw-tour-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_tour_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_tour_lite_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_button_text', array( 
		'selector' => '.services-box .contentt-btn a', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_button_text', 
	));

    $wp_customize->add_setting('vw_tour_lite_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_button_text',array(
		'label'	=> __('Add Button Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_blog_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_blog_button_icon',array(
		'label'	=> __('Add Blog Button Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_button_settings',
		'setting'	=> 'vw_tour_lite_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_tour_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-tour-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_tour_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_related_post',array(
		'label' => esc_html__( 'Related Post','vw-tour-lite' ),
		'section' => 'vw_tour_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_tour_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_tour_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_float'
	));
	$wp_customize->add_control('vw_tour_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_tour_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-tour-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_tour_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-tour-lite' ),
		'section' => 'vw_tour_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_tour_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-tour-lite' ),
		'section' => 'vw_tour_lite_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_tour_lite_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS PAGE', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT PAGE', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_tour_lite_404_page',array(
		'title'	=> __('404 Page Settings','vw-tour-lite'),
		'panel' => 'vw_tour_lite_panel_id',
	));	

	$wp_customize->add_setting('vw_tour_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_tour_lite_404_page_title',array(
		'label'	=> __('Add Title','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_tour_lite_404_page_content',array(
		'label'	=> __('Add Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_tour_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-tour-lite'),
		'panel' => 'vw_tour_lite_panel_id',
	));	

	$wp_customize->add_setting('vw_tour_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_social_icon_width',array(
		'label'	=> __('Icon Width','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_social_icon_height',array(
		'label'	=> __('Icon Height','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_tour_lite_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_tour_lite_responsive_media',array(
		'title'	=> __('Responsive Media','vw-tour-lite'),
		'panel' => 'vw_tour_lite_panel_id',
	));

	$wp_customize->add_setting( 'vw_tour_lite_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_tour_lite_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_tour_lite_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-tour-lite' ),
      'section' => 'vw_tour_lite_responsive_media'
    )));

    $wp_customize->add_setting('vw_tour_lite_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_responsive_media',
		'setting'	=> 'vw_tour_lite_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_tour_lite_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_responsive_media',
		'setting'	=> 'vw_tour_lite_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_tour_lite_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-tour-lite' ),
		'priority' => null,
		'panel' => 'vw_tour_lite_panel_id'
	) );

	$wp_customize->add_setting('vw_tour_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Tour_Lite_Content_Creation( $wp_customize, 'vw_tour_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-tour-lite' ),
		),
		'section' => 'vw_tour_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-tour-lite' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_tour_lite_footer',array(
		'title'	=> __('Footer Text','vw-tour-lite'),
		'description'=> __('This section will appear in footer.','vw-tour-lite'),
		'panel' => 'vw_tour_lite_panel_id',
	));
	
	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_footer_copy', array( 
		'selector' => '.copyright-wrapper .copyright p', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_footer_copy', 
	));

	$wp_customize->add_setting('vw_tour_lite_footer_copy',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_tour_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-tour-lite'),
		'section'=> 'vw_tour_lite_footer',
		'setting'=> 'vw_tour_lite_footer_copy',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_tour_lite_copyright_alingment',array(
        'default' => __('center','vw-tour-lite'),
        'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Tour_Lite_Image_Radio_Control($wp_customize, 'vw_tour_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-tour-lite'),
        'section' => 'vw_tour_lite_footer',
        'settings' => 'vw_tour_lite_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/images/copyright1.png',
            'center' => get_template_directory_uri().'/images/copyright2.png',
            'right' => get_template_directory_uri().'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_tour_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_tour_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-tour-lite' ),
      	'section' => 'vw_tour_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_tour_lite_scroll_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_tour_lite_customize_partial_vw_tour_lite_scroll_top_icon', 
	));

    $wp_customize->add_setting('vw_tour_lite_scroll_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Tour_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_tour_lite_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-tour-lite'),
		'transport' => 'refresh',
		'section'	=> 'vw_tour_lite_footer',
		'setting'	=> 'vw_tour_lite_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_tour_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_tour_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );
	
	$wp_customize->add_setting('vw_tour_lite_scroll_top_alignment',array(
       'default' => __('Right','vw-tour-lite'),
       'sanitize_callback' => 'vw_tour_lite_sanitize_choices'
	));

	$wp_customize->add_control(new VW_Tour_Lite_Image_Radio_Control($wp_customize, 'vw_tour_lite_scroll_top_alignment', array(
       'type' => 'select',
       'label' => __('Scroll To Top','vw-tour-lite'),
       'section' => 'vw_tour_lite_footer',
       'settings' => 'vw_tour_lite_scroll_top_alignment',
       'choices' => array(
           'Left' => get_template_directory_uri().'/images/layout1.png',
           'Center' => get_template_directory_uri().'/images/layout2.png',
           'Right' => get_template_directory_uri().'/images/layout3.png'
   	))));

	//Woocommerce settings
	$wp_customize->add_section('vw_tour_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-tour-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_tour_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-tour-lite' ),
		'section' => 'vw_tour_lite_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_tour_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_tour_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Tour_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_tour_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-tour-lite' ),
		'section' => 'vw_tour_lite_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_tour_lite_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_float'
	));
	$wp_customize->add_control('vw_tour_lite_products_per_page',array(
		'label'	=> __('Products Per Page','vw-tour-lite'),
		'description' => __('Display on shop page','vw-tour-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_tour_lite_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_tour_lite_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_tour_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_tour_lite_products_per_row',array(
		'label'	=> __('Products Per Row','vw-tour-lite'),
		'description' => __('Display on shop page','vw-tour-lite'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_tour_lite_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_tour_lite_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_tour_lite_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_tour_lite_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-tour-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-tour-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-tour-lite' ),
        ),
		'section'=> 'vw_tour_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_tour_lite_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_tour_lite_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_tour_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_tour_lite_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-tour-lite' ),
		'section'     => 'vw_tour_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Has to be at the top
	$wp_customize->register_panel_type( 'VW_Tour_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Tour_Lite_WP_Customize_Section' );

}
add_action( 'customize_register', 'vw_tour_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
	class VW_Tour_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_tour_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Tour_Lite_WP_Customize_Section extends WP_Customize_Section {  	
	    public $section;
	    public $type = 'vw_tour_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_tour_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_tour_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Tour_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Tour_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Tour_Lite_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Tour Pro Theme', 'vw-tour-lite' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-tour-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/vw-tour-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Tour_Lite_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-tour-lite' ),
			'pro_text' => esc_html__( 'Docs', 'vw-tour-lite' ),
			'pro_url'  => admin_url( 'themes.php?page=vw_tour_lite_guide' )
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-tour-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-tour-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Tour_Lite_Customize::get_instance();