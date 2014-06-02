<?php
/**
 * GMC Functions
 *
 * @package GMC
 * 
 * @since   1.0
 */ 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Load Scripts for the site
 *
 * @since  1.0
 * @author  Fifty and Fifty
 * @return [void]
 */
function TEMPLATE_enqueue_scripts_styles() 
{
    
    $js_path  = get_stylesheet_directory_uri() . '/assets/js/';
    $css_path = get_stylesheet_directory_uri() . '/assets/css/';

    // wp_register_script( 'template-scripts', $js_path. 'app.js', array('jquery'), TEMPLATE_VERSION, true );    
    // wp_enqueue_script( 'template-scripts' );

    // wp_register_style( 'template-styles', get_stylesheet_directory_uri() . '/style.css', '', TEMPLATE_VERSION );
    // wp_enqueue_style('template-styles');


}
add_action( 'wp_enqueue_scripts', 'TEMPLATE_enqueue_scripts_styles', 100 );