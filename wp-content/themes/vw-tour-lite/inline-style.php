<?php

	$vw_tour_lite_hi_first_color = get_theme_mod('vw_tour_lite_hi_first_color');

	$vw_tour_lite_custom_css ='';
	/*------------------------------ Global First Color -----------*/

	if($vw_tour_lite_hi_first_color != false){
		$vw_tour_lite_custom_css .='#header, .footersec, .sidebar h3,.service-text .read-more, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce span.onsale,.woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce input.button.alt,.sidebar .custom-social-icons i, input[type="submit"],.woocommerce .cart .button, .woocommerce .cart input.button,.copyright-wrapper,#slider .more-btn a:hover,nav.woocommerce-MyAccount-navigation li ,#comments input[type="submit"].submit,.sidebar input[type="submit"],.sidebar .tagcloud a:hover, #header main-navigation ul.sub-menu li a, .pagination .current, .pagination a:hover, .footersec .woocommerce-product-search button, .sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content, .sidebar .woocommerce-product-search button, .header-fixed, .sidebar a.custom_read_more, .footersec a.custom_read_more, .nav-next a, .nav-previous a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover{';
				$vw_tour_lite_custom_css .='background-color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_first_color != false){
		$vw_tour_lite_custom_css .='header.entry-header,.sidebar aside, .sidebar .custom-social-icons, .services-box,.sidebar input[type="search"],.service-text .read-more,.woocommerce-message,.footersec .custom-social-icons i:hover,.woocommerce select.orderby,li.product, #comments input[type="submit"].submit, .sidebar .woocommerce.widget_shopping_cart .buttons a, .woocommerce .widget_price_filter .price_slider_amount .button, .sidebar .woocommerce-product-search button:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .sidebar a.custom_read_more{';
				$vw_tour_lite_custom_css .='border-color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_first_color != false){
		$vw_tour_lite_custom_css .='.services-box h3,.metabox .entry-date, .metabox .entry-author a, .metabox .entry-comments,.woocommerce-message::before, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover,.footersec .custom-social-icons i:hover,h1.woocommerce-products-header__title,p.woocommerce-result-count,.woocommerce select.orderby,h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, .service-text a.read-more:hover, .sidebar .custom-social-icons i:hover, .post-info .entry-date, .post-info .entry-author a, .post-info .entry-comments, .post-info .entry-date a, .post-info .entry-author i, .service-text a, .sidebar .woocommerce-product-search button:hover, .sidebar a.custom_read_more:hover, .footersec a.custom_read_more:hover{';
				$vw_tour_lite_custom_css .='color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_first_color != false){
		$vw_tour_lite_custom_css .='.sidebar .woocommerce.widget_shopping_cart .buttons a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce button.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover{';
				$vw_tour_lite_custom_css .='color: '.esc_html($vw_tour_lite_hi_first_color).'!important;';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_first_color != false){
		$vw_tour_lite_custom_css .='li.product{
		box-shadow: 4px 4px 10px '.esc_html($vw_tour_lite_hi_first_color).';
		}';
	}

	/*------------------------------ Global Second Color -----------------*/ 

	$vw_tour_lite_hi_second_color = get_theme_mod('vw_tour_lite_hi_second_color');

	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='#header main-navigation ul.sub-menu li a:hover,#slider .more-btn a,input[type="submit"]:hover,.footersec .tagcloud a:hover,.scrollup i, #comments a.comment-reply-link, .sidebar .widget_calendar tbody a, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .footersec .woocommerce.widget_shopping_cart .buttons a:hover, .footersec .woocommerce-product-search button:hover, .footersec .widget_price_filter .ui-slider .ui-slider-range, .footersec .widget_price_filter .ui-slider .ui-slider-handle, .footersec .widget_price_filter .price_slider_amount .button:hover, .nav-previous a:hover, .nav-next a:hover{';
				$vw_tour_lite_custom_css .='background-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='#header main-navigation ul li a:hover{';
				$vw_tour_lite_custom_css .='border-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='a, .single-post .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, span.posted_in a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, #header .custom-social-icons a, #header .custom-social-icons i:hover, .woocommerce p.stars a{';
				$vw_tour_lite_custom_css .='color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='.single-post .post-navigation a:hover, .entry-content a, .sidebar p a, #comments p a, .comment-meta.commentmetadata a , span.posted_in a{';
				$vw_tour_lite_custom_css .='color: '.esc_html($vw_tour_lite_hi_second_color).'!important;';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='.main-navigation ul ul{';
				$vw_tour_lite_custom_css .='border-top-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	if($vw_tour_lite_hi_second_color != false){
		$vw_tour_lite_custom_css .='.main-navigation ul ul{';
				$vw_tour_lite_custom_css .='border-bottom-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$vw_tour_lite_custom_css .='}';
	}
	/*---------------------------Width Layout -------------------*/

	$vw_tour_lite_theme_lay = get_theme_mod( 'vw_tour_lite_width_option','Full Width');
        if($vw_tour_lite_theme_lay == 'Boxed'){
			$vw_tour_lite_custom_css .='body{';
				$vw_tour_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == 'Wide Width'){
			$vw_tour_lite_custom_css .='body{';
				$vw_tour_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == 'Full Width'){
			$vw_tour_lite_custom_css .='body{';
				$vw_tour_lite_custom_css .='max-width: 100%;';
			$vw_tour_lite_custom_css .='}';
		}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_tour_lite_theme_lay = get_theme_mod( 'vw_tour_lite_slider_opacity_color','0.5');
        if($vw_tour_lite_theme_lay == '0'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.1'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.1';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.2'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.2';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.3'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.3';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.4'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.4';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.5'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.5';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.6'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.6';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.7'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.7';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.8'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.8';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '0.9'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:0.9';
			$vw_tour_lite_custom_css .='}';
		}else if($vw_tour_lite_theme_lay == '1'){
			$vw_tour_lite_custom_css .='#slider img{';
				$vw_tour_lite_custom_css .='opacity:1';
			$vw_tour_lite_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_tour_lite_theme_lay = get_theme_mod( 'vw_tour_lite_slider_content_option','Center');
	   if($vw_tour_lite_theme_lay == 'Left'){
	$vw_tour_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
	$vw_tour_lite_custom_css .='text-align:left; left:12%; right:45%';
	$vw_tour_lite_custom_css .='}';
	}else if($vw_tour_lite_theme_lay == 'Center'){
		$vw_tour_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
		$vw_tour_lite_custom_css .='text-align:center; left:25%; right:25%;';
		$vw_tour_lite_custom_css .='}';
	}else if($vw_tour_lite_theme_lay == 'Right'){
		$vw_tour_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
		$vw_tour_lite_custom_css .='text-align:right; left:45%; right:12%;';
		$vw_tour_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_tour_lite_slider_height = get_theme_mod('vw_tour_lite_slider_height');
	if($vw_tour_lite_slider_height != false){
		$vw_tour_lite_custom_css .='#slider img{';
			$vw_tour_lite_custom_css .='height: '.esc_html($vw_tour_lite_slider_height).';';
		$vw_tour_lite_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_tour_lite_slider = get_theme_mod('vw_tour_lite_slider_hide_show');
	if($vw_tour_lite_slider == false){
		$vw_tour_lite_custom_css .='.page-template-custom-home-page #header{';
			$vw_tour_lite_custom_css .='margin-bottom: 10px;';
		$vw_tour_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_tour_lite_theme_lay = get_theme_mod( 'vw_tour_lite_blog_layout_option','Default');
    if($vw_tour_lite_theme_lay == 'Default'){
		$vw_tour_lite_custom_css .='.services-box{';
			$vw_tour_lite_custom_css .='';
		$vw_tour_lite_custom_css .='}';
	}else if($vw_tour_lite_theme_lay == 'Center'){
		$vw_tour_lite_custom_css .='.services-box, .services-box h2, .services-box p{';
			$vw_tour_lite_custom_css .='text-align:center;';
		$vw_tour_lite_custom_css .='}';
		$vw_tour_lite_custom_css .='.post-info{';
			$vw_tour_lite_custom_css .='margin-top: 10px;';
		$vw_tour_lite_custom_css .='}';
		$vw_tour_lite_custom_css .='.sticky .services-box h2{';
			$vw_tour_lite_custom_css .='display: unset;';
		$vw_tour_lite_custom_css .='}';
		$vw_tour_lite_custom_css .='.services-box .read-more{';
			$vw_tour_lite_custom_css .='display: inline-block;';
		$vw_tour_lite_custom_css .='}';
	}else if($vw_tour_lite_theme_lay == 'Left'){
		$vw_tour_lite_custom_css .='.services-box, .services-box h2, .services-box p{';
			$vw_tour_lite_custom_css .='text-align:Left;';
		$vw_tour_lite_custom_css .='}';
		$vw_tour_lite_custom_css .='.services-box img, .services-box .post-info{';
			$vw_tour_lite_custom_css .='margin-bottom:0px;';
		$vw_tour_lite_custom_css .='}';
		$vw_tour_lite_custom_css .='.services-box h2, .services-box .contentt-btn{';
			$vw_tour_lite_custom_css .='padding: 5px 10px;';
		$vw_tour_lite_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_tour_lite_resp_topbar = get_theme_mod( 'vw_tour_lite_resp_topbar_hide_show',false);
    if($vw_tour_lite_resp_topbar == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.top-header{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_resp_topbar == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.top-header{';
			$vw_tour_lite_custom_css .='display:none;';
		$vw_tour_lite_custom_css .='} }';
	}

	$vw_tour_lite_resp_stickyheader = get_theme_mod( 'vw_tour_lite_stickyheader_hide_show',false);
    if($vw_tour_lite_resp_stickyheader == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.header-fixed{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_resp_stickyheader == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.header-fixed{';
			$vw_tour_lite_custom_css .='display:none;';
		$vw_tour_lite_custom_css .='} }';
	}

	$vw_tour_lite_resp_slider = get_theme_mod( 'vw_tour_lite_resp_slider_hide_show',false);
    if($vw_tour_lite_resp_slider == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='#slider{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_resp_slider == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='#slider{';
			$vw_tour_lite_custom_css .='display:none;';
		$vw_tour_lite_custom_css .='} }';
	}

	$vw_tour_lite_metabox = get_theme_mod( 'vw_tour_lite_metabox_hide_show',true);
    if($vw_tour_lite_metabox == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.post-info{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_metabox == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.post-info{';
			$vw_tour_lite_custom_css .='display:none;';
		$vw_tour_lite_custom_css .='} }';
	}

	$vw_tour_lite_sidebar = get_theme_mod( 'vw_tour_lite_sidebar_hide_show',true);
    if($vw_tour_lite_sidebar == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.sidebar{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_sidebar == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.sidebar{';
			$vw_tour_lite_custom_css .='display:none;';
		$vw_tour_lite_custom_css .='} }';
	}

	$vw_tour_lite_resp_scroll_top = get_theme_mod( 'vw_tour_lite_resp_scroll_top_hide_show',true);
    if($vw_tour_lite_resp_scroll_top == true){
    	$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='display:block;';
		$vw_tour_lite_custom_css .='} }';
	}else if($vw_tour_lite_resp_scroll_top == false){
		$vw_tour_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='display:none !important;';
		$vw_tour_lite_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_tour_lite_topbar_padding_top_bottom = get_theme_mod('vw_tour_lite_topbar_padding_top_bottom');
	if($vw_tour_lite_topbar_padding_top_bottom != false){
		$vw_tour_lite_custom_css .='.top-header{';
			$vw_tour_lite_custom_css .='padding-top: '.esc_html($vw_tour_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_tour_lite_topbar_padding_top_bottom).';';
		$vw_tour_lite_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_tour_lite_sticky_header_padding = get_theme_mod('vw_tour_lite_sticky_header_padding');
	if($vw_tour_lite_sticky_header_padding != false){
		$vw_tour_lite_custom_css .='.header-fixed{';
			$vw_tour_lite_custom_css .='padding: '.esc_html($vw_tour_lite_sticky_header_padding).';';
		$vw_tour_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_tour_lite_button_padding_top_bottom = get_theme_mod('vw_tour_lite_button_padding_top_bottom');
	$vw_tour_lite_button_padding_left_right = get_theme_mod('vw_tour_lite_button_padding_left_right');
	if($vw_tour_lite_button_padding_top_bottom != false || $vw_tour_lite_button_padding_left_right != false){
		$vw_tour_lite_custom_css .='.services-box .read-more{';
			$vw_tour_lite_custom_css .='padding-top: '.esc_html($vw_tour_lite_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_tour_lite_button_padding_top_bottom).';padding-left: '.esc_html($vw_tour_lite_button_padding_left_right).';padding-right: '.esc_html($vw_tour_lite_button_padding_left_right).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_button_border_radius = get_theme_mod('vw_tour_lite_button_border_radius');
	if($vw_tour_lite_button_border_radius != false){
		$vw_tour_lite_custom_css .='.services-box .read-more{';
			$vw_tour_lite_custom_css .='border-radius: '.esc_html($vw_tour_lite_button_border_radius).'px;';
		$vw_tour_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_tour_lite_single_blog_post_navigation_show_hide = get_theme_mod('vw_tour_lite_single_blog_post_navigation_show_hide',true);
	if($vw_tour_lite_single_blog_post_navigation_show_hide != true){
		$vw_tour_lite_custom_css .='.post-navigation{';
			$vw_tour_lite_custom_css .='display: none;';
		$vw_tour_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_tour_lite_copyright_alingment = get_theme_mod('vw_tour_lite_copyright_alingment');
	if($vw_tour_lite_copyright_alingment != false){
		$vw_tour_lite_custom_css .='.copyright p{';
			$vw_tour_lite_custom_css .='text-align: '.esc_html($vw_tour_lite_copyright_alingment).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_copyright_padding_top_bottom = get_theme_mod('vw_tour_lite_copyright_padding_top_bottom');
	if($vw_tour_lite_copyright_padding_top_bottom != false){
		$vw_tour_lite_custom_css .='.copyright-wrapper{';
			$vw_tour_lite_custom_css .='padding-top: '.esc_html($vw_tour_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_tour_lite_copyright_padding_top_bottom).';';
		$vw_tour_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_tour_lite_scroll_to_top_font_size = get_theme_mod('vw_tour_lite_scroll_to_top_font_size');
	if($vw_tour_lite_scroll_to_top_font_size != false){
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='font-size: '.esc_html($vw_tour_lite_scroll_to_top_font_size).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_scroll_to_top_padding = get_theme_mod('vw_tour_lite_scroll_to_top_padding');
	$vw_tour_lite_scroll_to_top_padding = get_theme_mod('vw_tour_lite_scroll_to_top_padding');
	if($vw_tour_lite_scroll_to_top_padding != false){
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='padding-top: '.esc_html($vw_tour_lite_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_tour_lite_scroll_to_top_padding).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_scroll_to_top_width = get_theme_mod('vw_tour_lite_scroll_to_top_width');
	if($vw_tour_lite_scroll_to_top_width != false){
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='width: '.esc_html($vw_tour_lite_scroll_to_top_width).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_scroll_to_top_height = get_theme_mod('vw_tour_lite_scroll_to_top_height');
	if($vw_tour_lite_scroll_to_top_height != false){
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='height: '.esc_html($vw_tour_lite_scroll_to_top_height).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_scroll_to_top_border_radius = get_theme_mod('vw_tour_lite_scroll_to_top_border_radius');
	if($vw_tour_lite_scroll_to_top_border_radius != false){
		$vw_tour_lite_custom_css .='.scrollup i{';
			$vw_tour_lite_custom_css .='border-radius: '.esc_html($vw_tour_lite_scroll_to_top_border_radius).'px;';
		$vw_tour_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_tour_lite_social_icon_font_size = get_theme_mod('vw_tour_lite_social_icon_font_size');
	if($vw_tour_lite_social_icon_font_size != false){
		$vw_tour_lite_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_tour_lite_custom_css .='font-size: '.esc_html($vw_tour_lite_social_icon_font_size).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_social_icon_padding = get_theme_mod('vw_tour_lite_social_icon_padding');
	if($vw_tour_lite_social_icon_padding != false){
		$vw_tour_lite_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_tour_lite_custom_css .='padding: '.esc_html($vw_tour_lite_social_icon_padding).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_social_icon_width = get_theme_mod('vw_tour_lite_social_icon_width');
	if($vw_tour_lite_social_icon_width != false){
		$vw_tour_lite_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_tour_lite_custom_css .='width: '.esc_html($vw_tour_lite_social_icon_width).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_social_icon_height = get_theme_mod('vw_tour_lite_social_icon_height');
	if($vw_tour_lite_social_icon_height != false){
		$vw_tour_lite_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_tour_lite_custom_css .='height: '.esc_html($vw_tour_lite_social_icon_height).';';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_social_icon_border_radius = get_theme_mod('vw_tour_lite_social_icon_border_radius');
	if($vw_tour_lite_social_icon_border_radius != false){
		$vw_tour_lite_custom_css .='.sidebar .custom-social-icons i, .footersec .custom-social-icons i{';
			$vw_tour_lite_custom_css .='border-radius: '.esc_html($vw_tour_lite_social_icon_border_radius).'px;';
		$vw_tour_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_tour_lite_products_padding_top_bottom = get_theme_mod('vw_tour_lite_products_padding_top_bottom');
	if($vw_tour_lite_products_padding_top_bottom != false){
		$vw_tour_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_tour_lite_custom_css .='padding-top: '.esc_html($vw_tour_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_html($vw_tour_lite_products_padding_top_bottom).'!important;';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_products_padding_left_right = get_theme_mod('vw_tour_lite_products_padding_left_right');
	if($vw_tour_lite_products_padding_left_right != false){
		$vw_tour_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_tour_lite_custom_css .='padding-left: '.esc_html($vw_tour_lite_products_padding_left_right).'!important; padding-right: '.esc_html($vw_tour_lite_products_padding_left_right).'!important;';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_products_box_shadow = get_theme_mod('vw_tour_lite_products_box_shadow');
	if($vw_tour_lite_products_box_shadow != false){
		$vw_tour_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_tour_lite_custom_css .='box-shadow: '.esc_html($vw_tour_lite_products_box_shadow).'px '.esc_html($vw_tour_lite_products_box_shadow).'px '.esc_html($vw_tour_lite_products_box_shadow).'px #ddd;';
		$vw_tour_lite_custom_css .='}';
	}

	$vw_tour_lite_products_border_radius = get_theme_mod('vw_tour_lite_products_border_radius');
	if($vw_tour_lite_products_border_radius != false){
		$vw_tour_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_tour_lite_custom_css .='border-radius: '.esc_html($vw_tour_lite_products_border_radius).'px;';
		$vw_tour_lite_custom_css .='}';
	}