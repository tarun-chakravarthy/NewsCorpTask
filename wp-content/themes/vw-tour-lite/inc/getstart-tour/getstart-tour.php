<?php
//about theme info
add_action( 'admin_menu', 'vw_tour_lite_gettingstarted' );
function vw_tour_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Tour Lite', 'vw-tour-lite'), esc_html__('About VW Tour Lite', 'vw-tour-lite'), 'edit_theme_options', 'vw_tour_lite_guide', 'vw_tour_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_tour_lite_admin_theme_style() {
   wp_enqueue_style( 'vw-tour-lite-font', vw_tour_lite_admin_font_url(), array() );
   wp_enqueue_style('vw-tour-lite-custom-admin-style', get_template_directory_uri() . '/inc/getstart-tour/getstart-tour.css');
   wp_enqueue_script('vw-tour-lite-tabs', get_template_directory_uri() . '/inc/getstart-tour/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_tour_lite_admin_theme_style');

// Theme Font URL
function vw_tour_lite_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_tour_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-tour-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Tour Theme', 'vw-tour-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-tour-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Tour at 20% Discount','vw-tour-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-tour-lite'); ?> ( <span><?php esc_html_e('vwpro20','vw-tour-lite'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_TOUR_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-tour-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="vw_tour_lite_open_tab(event, 'tour_lite')"><?php esc_html_e( 'Getting Started', 'vw-tour-lite' ); ?></button>		  
		  <button class="tablinks" onclick="vw_tour_lite_open_tab(event, 'tour_pro')"><?php esc_html_e( 'Get Premium', 'vw-tour-lite' ); ?></button>
		  <button class="tablinks" onclick="vw_tour_lite_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-tour-lite' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="tour_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-tour-lite' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Tour Lite Theme is a responsive multi-purpose tour WordPress theme which is ideal for tour and travel websites. It is best suited for travel agency website, traveling or journey blog, tourism, hotels, tour operator, travelers, vacation, holiday, tourist agencies, travel diaries, tourist destinations, travel magazines, travel guides, etc. Also, it can be used for personal, blogging, fashion, lifestyle, travel, technology, travel agencies, airlines, photographic agencies, or any other type of blog site. This user-friendly theme is suitable with the latest version of WordPress. By using this theme, you can create informative, eye-catching and engaging tour and travel websites. Its ultimate design makes it more beautiful and appealing to the visitors.','vw-tour-lite'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-tour-lite' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-tour-lite' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-tour-lite' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-tour-lite'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-tour-lite'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-tour-lite'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-tour-lite'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-tour-lite' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-tour-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_tour_lite_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-tour-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-tour-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_our_services') ); ?>" target="_blank"><?php esc_html_e('Why Choose Us Section','vw-tour-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-tour-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-tour-lite'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-tour-lite'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-tour-lite'); ?></a>
							</div> 
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-tour-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_tour_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-tour-lite'); ?></a>
							</div>
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-tour-lite'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-tour-lite'); ?></p>
                <ul>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-tour-lite'); ?></span><?php esc_html_e(' Go to ','vw-tour-lite'); ?>
				  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-tour-lite'); ?></b></p>

                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-tour-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-tour-lite'); ?></span><?php esc_html_e(' Go to ','vw-tour-lite'); ?>
				  	<b><?php esc_html_e(' Settings >> Reading ','vw-tour-lite'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-tour-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-tour-lite'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-tour-lite/" target="_blank"><?php esc_html_e('Documentation','vw-tour-lite'); ?></a></p>
                </ul>
		  	</div>
		</div>	

		<div id="tour_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-tour-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('A Tours & Travel WordPress theme should be fun and intricate. A premium Travel WordPress theme is supposed to be well structured and informative. Your visitors are mainly going to be on the hunt for information. So it becomes important to have a website with a theme that has the capability and power to provide all the necessary information under one roof. As the visitors are probably going to bounce between pages. In, the pursuit of correct knowledge. Our Travel WP theme can surely satisfy these visitors.','vw-tour-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_TOUR_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-tour-lite'); ?></a>
					<a href="<?php echo esc_url( VW_TOUR_LITE_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-tour-lite'); ?></a>
					<a href="<?php echo esc_url( VW_TOUR_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-tour-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/VW-Tour-&-Travel-Theme.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-tour-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-tour-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-tour-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-tour-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-tour-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-tour-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-tour-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-tour-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-tour-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-tour-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-tour-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-tour-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-tour-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-tour-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-tour-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart-tour/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_TOUR_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-tour-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-tour-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-tour-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-tour-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-tour-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-tour-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-tour-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_TOUR_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-tour-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>