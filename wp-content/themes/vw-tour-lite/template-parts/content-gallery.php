<?php
/**
 * The template part for displaying post
 *
 * @package VW Tours Lite 
 * @subpackage vw_tours_lite
 * @since VW Tours Lite 1.0
 */
?>
<?php 
  $vw_tour_lite_archive_year  = get_the_time('Y'); 
  $vw_tour_lite_archive_month = get_the_time('m'); 
  $vw_tour_lite_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="services-box">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };
        };
      ?>
      <div class="service-text">
        <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'vw_tour_lite_toggle_postdate',true) != '' || get_theme_mod( 'vw_tour_lite_toggle_author',true) != '' || get_theme_mod( 'vw_tour_lite_toggle_comments',true) != '') { ?>
          <div class="post-info">
            <?php if(get_theme_mod('vw_tour_lite_toggle_postdate',true)==1){ ?>
              <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $vw_tour_lite_archive_year, $vw_tour_lite_archive_month, $vw_tour_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('vw_tour_lite_toggle_author',true)==1){ ?>
              <span class="entry-author"><i class="far fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('vw_tour_lite_toggle_comments',true)==1){ ?>
              <span class="entry-comments"><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $vw_tour_lite_theme_lay = get_theme_mod( 'vw_tour_lite_excerpt_settings','Excerpt');
            if($vw_tour_lite_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($vw_tour_lite_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $excerpt = get_the_excerpt(); echo esc_html( vw_tour_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_tour_lite_excerpt_number','30')))); ?><?php echo esc_html(get_theme_mod('vw_tour_lite_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('vw_tour_lite_button_text','Read More') != ''){ ?>
          <div class="contentt-btn">
            <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html(get_theme_mod('vw_tour_lite_button_text',__('Read More','vw-tour-lite')));?><i class="<?php echo esc_attr(get_theme_mod('vw_tour_lite_blog_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_tour_lite_button_text',__('Read More','vw-tour-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
  </div>
</article>