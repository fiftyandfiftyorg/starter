<?php
/**
 * Shortcodes for Slides
 *
 * @author Fifty and Fifty
 * @since 1.0 
 */




function TEMPLATE_slider_shortcode( $atts, $content=null )
{

    extract( shortcode_atts( array(
        'numslides' => 3,
        'category' => ''
    // ...etc
    ), $atts ) );

    $slide_args = array(
        'post_type'      => 'slides',
        'posts_per_page' => $numslides,
        'tax_query'      => array(
                                array(
                                    'taxonomy' => 'slides_category',
                                    'field'    => 'slug',
                                    'terms'    => $category
                                )
                            )
        );
    $slide_query = new WP_query( $slide_args );

    ob_start();

    if( $slide_query->have_posts() ) : ?>
    <div class="flexslider" id="home-slider">
      <ul class="slides">
        <?php while( $slide_query->have_posts() ) : $slide_query->the_post(); ?>
        <li class="<?php the_TEMPLATE_color_class(); ?>" style="background-image: url('<?php TEMPLATE_slide_background_url(); ?>')">
          <div class="slide-container">

            <?php if( !TEMPLATE_is_hide_text() ) : ?>
              <div class="<?php the_TEMPLATE_text_align(); ?>">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                
                <?php if( has_TEMPLATE_link_text() ) : ?>
                <div class="bottom-slider-container">
                  <a href="<?php the_TEMPLATE_link(); ?>" class="btn flat white icon icon-long-arrow-right long-arrow"><?php the_TEMPLATE_link_text(); ?></a>
                  
                  <?php if( has_acf_image( 'icon_image' ) ) :  ?>
                    <div class="slider-icon" style="background-image: url('<?php TEMPLATE_the_acf_image('icon_image', 'full' ); ?>');"></div>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
    <div class="clear"></div>
    <?php endif; wp_reset_query(); ?>

<?php
    $slides = ob_get_clean();

    return $slides;

}
add_shortcode('TEMPLATE_slider', 'TEMPLATE_slider_shortcode' );