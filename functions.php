<?php
/**
 * Functions File
 *
 * @package WordPress
 * @since  1.0
 */



/**
 * Define the version in case we need to do version checks. 
 */
if ( ! defined( 'TEMPLATE_VERSION' ) )
  define( 'TEMPLATE_VERSION', '1.0' );

/**
 * Init the required files. If you need to include a file, 
 * add it here. Keep it organized. 
 *
 * @since  1.0
 * @author Fifty and Fifty <[email]>
 * @return [type] [description]
 */
function TEMPLATE_init()
{
    //Load image functions/sizes
    require_once get_stylesheet_directory() . '/includes/images.php';

    //Load the scripts and styles
    require_once get_stylesheet_directory() . '/includes/scripts.php';

    //Load Misc Global Functions
    require_once get_stylesheet_directory() . '/includes/misc.php';

    //Load Misc Shortcode Functions
    require_once get_stylesheet_directory() . '/includes/shortcodes.php';

    //Load Products Meta Functions
    require_once get_stylesheet_directory() . '/includes/products/functions.php';

    //Load Silde Functions
    require_once get_stylesheet_directory() . '/includes/slides/functions.php';
    require_once get_stylesheet_directory() . '/includes/slides/metabox-add.php';
    require_once get_stylesheet_directory() . '/includes/slides/shortcodes.php';

}
add_action( 'init', 'TEMPLATE_init' );