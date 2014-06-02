<?php
/**
 * Set up image sizes
 */

if( function_exists('add_image_size')){
    // add_image_size( 'org-image', 500, 500, true );
}




/**
 * Outputs the featured image for a page in a URL
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @param  [string] $size [accepts any custom image size above or the standard WP ones]
 * @return [type]       [description]
 */
function TEMPLATE_the_featured_image( $size )
{
    global $post;

    $size    = isset( $size ) ? $size : 'full';

    if( has_post_thumbnail() ) {
        $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
        $background = $background[0];    
    }

    echo $background;

}




/**
 * This function is intended to help you grab an image uploaded with ACF. 
 * 
 * @param  [string]  $field The ACF field you want to grab content from
 * @param  [string]  $size  The size of the image (defaults to thumbnail)
 * @param  boolean $subfield If the field is in a repeater, you need to use get_sub_field()
 * @uses   get_field()
 * @uses   get_sub_field()
 * @return [string] the URL of the image
 */
function TEMPLATE_the_acf_image( $field = null, $size, $subfield = false )
{
    global $post;

    $size = isset( $size ) ? $size : 'thumbnail';
    
    if( $subfield == false ){
        $image = get_field( $field, $post->ID );
    }else{
        $image = get_sub_field( $field, $post->ID );
    }

    // Since the array given us doesn't include a "full" size in the sizes array, 
    // we need to step up one to get it
    if( $size == 'full' ){
        $image = $image['url'];
    }else{
        $image = $image['sizes'][$size];
    }
    
    echo $image;
}


/**
 * This function is intended to help you grab an image uploaded with ACF. 
 * 
 * @param  [string]  $field The ACF field you want to grab content from
 * @param  [string]  $size  The size of the image (defaults to thumbnail)
 * @param  boolean $subfield If the field is in a repeater, you need to use get_sub_field()
 * @uses   get_field()
 * @uses   get_sub_field()
 * @return [string] the URL of the image
 */
function TEMPLATE_the_acf_option_image( $field = null, $size = 'full' )
{
    
    $image = get_field( $field, 'option' );    

    // Since the array given us doesn't include a "full" size in the sizes array, 
    // we need to step up one to get it
    if( $size == 'full' ){
        $image = $image['url'];
    }else{
        $image = $image['sizes'][$size];
    }
    
    echo $image;
}






/** 
 * Checks to see if an image exists in the DB
 *
 * It does not check for subfields yet.
 *
 * @uses get_field()
 * @param  [type]  $field [description]
 * @return boolean        [description]
 */
function has_acf_image( $field = null )
{
    global $post;
    $image = get_field( $field );
    if( !empty( $image ) ){
        return true;
    }

    return false;
}




