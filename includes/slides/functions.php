<?php
/**
 * Slides Functions
 *
 * @package     IF
 * @subpackage  Admin/Media
 * @copyright   Copyright (c) 2013, Fifty and Fifty
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Outputs the class set for the slide
 *
 * @uses get_post_meta()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function the_TEMPLATE_color_class()
{
    global $post;

    $TEMPLATE_colors = get_post_meta( $post->ID, 'TEMPLATE_colors', true );

    echo $TEMPLATE_colors;

}

/**
 * Outputs a URL for the background iamge
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @param  [string] $size defaults to 'full'.
 * @return [string]
 */
function TEMPLATE_slide_background_url( $size = null )
{
    global $post;

    $size = isset( $size ) ? $size : 'full';

    if( has_post_thumbnail() ) {
        $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
        $background = $background[0];    
    }

    echo $background;
}



/**
 * Outputs the link set for the slide
 *
 * @uses get_post_meta()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function the_TEMPLATE_link()
{
    global $post;

    $TEMPLATE_link = get_post_meta( $post->ID, 'TEMPLATE_link', true );

    echo $TEMPLATE_link;

}

/**
 * Outputs the link set for the slide
 *
 * @uses get_post_meta()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function the_TEMPLATE_link_text()
{
    global $post;

    $TEMPLATE_link_text = get_post_meta( $post->ID, 'TEMPLATE_link_text', true );

    echo $TEMPLATE_link_text;

}


function has_TEMPLATE_link_text()
{
    global $post;

    $TEMPLATE_link_text = get_post_meta( $post->ID, 'TEMPLATE_link_text', true );

    if( $TEMPLATE_link_text ) {
        return true;
    }

    return false;

}


/**
 * Outputs the text alignment
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function the_TEMPLATE_text_align()
{
    global $post;

    $slide_text_alignment  = get_post_meta( $post->ID, "_FFW_slide_text_alignment", true );

    echo $slide_text_alignment;
}


/**
 * Function to output a slider and allow the number of posts and category to be customizable.
 *
 * @author Fifty and Fifty
 * @since 1.0
 * 
 * @param  [type] $numposts [description]
 * @param  [type] $category [description]
 * @return [type]           [description]
 */
function TEMPLATE_slider( $numposts, $category )
{
    global $post;

    $numposts = isset( $numposts ) ? $numposts : 3;
    $category = isset( $category ) ? $category : 'home';

    $slide_args = array(
        'post_type'      => 'slides',
        'posts_per_page' => $numposts,
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
    <?php endif; wp_reset_query();

    $slides = ob_get_clean();

    echo $slides;

}


/**
 * Gets the category from the slider template metabox
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @uses get_field() from Advanced Custom Fields
 * @return [type] [description]
 */
function get_slide_category()
{
    global $post;

    $slide_obj = get_field( 'slide_category', $post->ID );

    if( $slide_obj ){
        return $slide_obj->slug;    
    }

    return false;
    
}


/**
 * Gets the number of slides to show from the slider template metabox
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @uses get_field() from Advanced Custom Fields
 * @return [type] [description]
 */
function get_slide_count()
{
    global $post;

    $number_slides = get_field( 'number_slides', $post->ID );

    if( $number_slides ) {
        return $number_slides;
    }

    return (int)3;
}



function TEMPLATE_is_hide_text()
{
    global $post;

    // $hide_text = get_post_meta( $post->ID, '_FFW_slide_remove_text', true );

    if( get_post_meta( $post->ID, '_FFW_slide_remove_text', true ) ) {
        return true;
    }

    return false;
}


