<?php
/**
 * The template part for displaying Single Post
 *
 * @package VW Tours Lite 
 * @subpackage vw_tours_lite
 * @since 1.0
 */
?>
<?php 
  $vw_tour_lite_archive_year  = get_the_time('Y'); 
  $vw_tour_lite_archive_month = get_the_time('m'); 
  $vw_tour_lite_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
  <div class="single-post">
    <div class="service-text">
      <h1 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
      <?php if( get_theme_mod( 'vw_tour_lite_toggle_postdate',true) != '' || get_theme_mod( 'vw_tour_lite_toggle_author',true) != '' || get_theme_mod( 'vw_tour_lite_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_tour_lite_toggle_postdate',true)==1){ ?>
            <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $vw_tour_lite_archive_year, $vw_tour_lite_archive_month, $vw_tour_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_tour_lite_toggle_author',true)==1){ ?>
            <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_tour_lite_toggle_comments',true)==1){ ?>
            <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
          <?php } ?>
        </div>
      <?php } ?>
      <div class="feature-box">   
        <?php the_post_thumbnail(); ?>
      </div>
      <div class="entry-content"><?php the_content(); ?></div>
      <?php if(get_theme_mod('vw_tour_lite_toggle_tags',true)==1){ ?>
        <div class="tags"><?php the_tags(); ?></div>
      <?php } ?>
     <div class="clearfix"></div>
    </div>
  </div>
   
</article>