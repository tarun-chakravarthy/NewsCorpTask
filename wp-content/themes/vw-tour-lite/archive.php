<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package VW Tour Lite
 */

get_header(); ?>

<main id="maincontent" role="main" class="services">
    <div class="container">
        <?php
            $vw_tour_lite_left_right = get_theme_mod( 'vw_tour_lite_theme_options','Right Sidebar');
            if($vw_tour_lite_left_right == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', get_post_format() ); 
                        endwhile;
                        wp_reset_postdata();
                        else :
                            get_template_part( 'no-results', 'archive' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php }else if($vw_tour_lite_left_right == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                          get_template_part( 'template-parts/content', get_post_format() ); 
                        endwhile;
                        wp_reset_postdata();
                        else :
                            get_template_part( 'no-results', 'archive' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'One Column'){ ?>
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', get_post_format() ); 
                endwhile;
                wp_reset_postdata();
                else :
                    get_template_part( 'no-results', 'archive' ); 
                endif; 
            ?>
            <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                <div class="navigation">
                    <?php vw_tour_lite_blog_posts_pagination(); ?>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        <?php }else if($vw_tour_lite_left_right == 'Three Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-6 col-md-6">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                          get_template_part( 'template-parts/content', get_post_format() ); 
                        endwhile;
                        wp_reset_postdata();
                        else :
                            get_template_part( 'no-results', 'archive' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Four Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-3 col-md-3">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                          get_template_part( 'template-parts/content', get_post_format() ); 
                        endwhile;
                        wp_reset_postdata();
                        else :
                            get_template_part( 'no-results', 'archive' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
            </div>
        <?php }else if($vw_tour_lite_left_right == 'Grid Layout'){ ?>
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                              get_template_part( 'template-parts/grid-layout' ); 
                            endwhile;
                            wp_reset_postdata();
                            else :
                                get_template_part( 'no-results', 'archive' ); 
                            endif; 
                        ?>
                    </div>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else { ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                          get_template_part( 'template-parts/content', get_post_format() ); 
                        endwhile;
                        wp_reset_postdata();
                        else :
                            get_template_part( 'no-results', 'archive' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'vw_tour_lite_blog_pagination_hide_show',true) != '') { ?>
                        <div class="navigation">
                            <?php vw_tour_lite_blog_posts_pagination(); ?>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
</main>

<?php get_footer(); ?>