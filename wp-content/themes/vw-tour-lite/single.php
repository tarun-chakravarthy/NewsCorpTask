<?php
/**
 * The Template for displaying all single posts.
 *
 * @package VW Tour Lite
 */

get_header(); ?>

<?php do_action( 'vw_tour_lite_single_top' ); ?>

<div class="container">
    <main id="maincontent" role="main" class="middle-align">
        <?php
            $vw_tour_lite_left_right = get_theme_mod( 'vw_tour_lite_theme_options','Right Sidebar');
            if($vw_tour_lite_left_right == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="col-md-4"><?php get_sidebar('page'); ?></div>
                <div class="col-md-8" id="content-vw">
                   <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content-single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );

                        endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?>
                </div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-md-8" id="content-vw">
                   <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content-single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );
                            
                        endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?> 
                </div>
                <div class="col-md-4"><?php get_sidebar('page'); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'One Column'){ ?>
            <div id="content-vw">
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content-single' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                        
                    endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Three Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-6 col-md-6" id="content-vw">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content-single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );
                            
                        endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Four Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-3 col-md-3" id="content-vw">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content-single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );
                            
                        endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Grid Layout'){ ?>
            <div class="col-lg-8 col-md-8" id="content-vw">
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content-single' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                        
                    endwhile; // End of the loop.
                ?>
                <?php get_template_part('template-parts/related-posts'); ?>
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
        <?php }else { ?>
            <div class="row">
                <div class="col-md-8" id="content-vw">
                    <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content-single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_next_navigation_text','NEXT PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' .esc_html(get_theme_mod('vw_tour_lite_single_blog_prev_navigation_text','PREVIOUS PAGE')) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-tour-lite' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );
                            
                        endwhile; // End of the loop.
                    ?>
                    <?php get_template_part('template-parts/related-posts'); ?>
                </div>
                <div class="col-md-4"><?php get_sidebar('page'); ?></div>
            </div>
        <?php }?>
        <div class="clearfix"></div>
    </main>
</div>

<?php do_action( 'vw_tour_lite_single_bottom' ); ?>

<?php get_footer(); ?>