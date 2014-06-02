<?php
/**
 * Shortcodes
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Allow for container to be full width.
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @param  [type] $atts    [description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function TEMPLATE_container_full_shortcode( $atts, $content=null){

    global $post;

    extract( shortcode_atts( array(
        'class' => '',
        'style' => ''
    // ...etc
    ), $atts ) );

    $style_markup = !is_null( $style ) ? ' style="'. $style .'"' : '';

  ob_start(); ?>
    
    </div> <?php //close existing container ?>
        <div class="container-full <?php echo $class; ?>" <?php echo $style_markup; ?>>
            <?php echo do_shortcode( $content ); ?>
        </div>
    <div class="container"> <?php //open existing container ?>

  <?php      
  $container_full = ob_get_clean();

  return $container_full;
  
}
add_shortcode('container_full', 'TEMPLATE_container_full_shortcode');



/**
 * Returns the site's url
 * @return [type] [description]
 */
function TEMPLATE_site_url()
{
    return home_url() . '/';
}
add_shortcode('TEMPLATE_site_url', 'TEMPLATE_site_url');



function image_theme_url()
{
    return get_stylesheet_directory_uri() . '/';
}
add_shortcode('TEMPLATE_theme_url', 'image_theme_url');