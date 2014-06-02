<?php
/**
 * Misc Global Functions
 */






/**
 * Output the title of the blog set in Settings > Reading
 *
 * @uses get_option()
 * @uses get_the_title()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [string] [description]
 */
function TEMPLATE_blog_title()
{
    $blog_id = get_option('page_for_posts');

    echo get_the_title($blog_id);
}


/**
 * Output the link of the blog set in Settings > Reading
 *
 * @uses get_option()
 * @uses get_permalink()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [string] [description]
 */
function TEMPLATE_blog_link()
{
    $blog_id = get_option('page_for_posts' );

    echo get_permalink( $blog_id );
}


/**
 * Returns the title of the blog set in Settings > Reading
 *
 * @uses get_option()
 * @uses get_the_title()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [string] [description]
 */
function TEMPLATE_get_blog_title()
{
    $blog_id = get_option('page_for_posts');

    return get_the_title($blog_id);
}

/**
 * Output the link of the blog set in Settings > Reading
 *
 * @uses get_option()
 * @uses get_permalink()
 * @since 1.0
 * @author Fifty and Fifty
 * @return [string] [description]
 */
function TEMPLATE_get_blog_link()
{
    $blog_id = get_option('page_for_posts' );

    return get_permalink( $blog_id );
}




if(!function_exists('get_post_top_ancestor_id')){
    /**
     * Gets the id of the topmost ancestor of the current page. Returns the current
     * page's id if there is no parent.
     * 
     * @uses object $post
     * @return int 
     */
    function get_post_top_ancestor_id()
    {
        global $post;
        
        if( $post->post_parent ){
            $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
            return $ancestors[0];
        }
        
        return $post->ID;
    }
}


/**
 * Output a list of subnavigation on pages
 *
 * @uses wp_list_pages
 * @author Fifty and Fifty
 * @since 1.0
 * @return [type] [description]
 */
function TEMPLATE_list_pages()
{
    global $post;

    if( $post->post_parent ){
        //$children = wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) );
        $children = wp_list_pages('title_li=&child_of=' . $post->post_parent . '&echo=0&depth=1');
    } else{
        $children = wp_list_pages('title_li=&child_of='.$post->ID."&echo=0&depth=1");

    }

    echo $children;
}

function TEMPLATE_page_title()
{

    global $post;

    if( $post->post_parent )
    {

        $parent_id    = get_post_top_ancestor_id();
        $parent_url   = get_permalink( $parent_id );
        $parent_title = get_the_title( $parent_id );

        $page_title = '<a href="' . $parent_url . '">' . $parent_title . '</a>';
    }else{

        $page_title = get_the_title( $post->ID );
    }

    echo $page_title;
}




/**
 * Outputs the page_for_posts link
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function TEMPLATE_the_blog_title()
{
    $blog_id = get_option('page_for_posts');

    echo get_the_title($blog_id);
}


/**
 * Outputs the page_for_posts link
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function TEMPLATE_the_blog_link()
{
    $blog_id = get_option('page_for_posts' );

    echo get_permalink( $blog_id );
}


/**
 * Returns the page_for_posts title
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function TEMPLATE_get_the_blog_title()
{
    $blog_id = get_option('page_for_posts');

    return get_the_title($blog_id);
}

/**
 * Returns the page_for_posts link
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [type] [description]
 */
function TEMPLATE_get_the_blog_link()
{
    $blog_id = get_option('page_for_posts' );

    return get_permalink( $blog_id );
}




/**
 * Returns post/page authors email address
 *
 * @author Fifty and Fifty
 * @since 1.0
 * @uses get_the_author_meta()
 * @return [string] [description]
 */
function TEMPLATE_get_user_email()
{
    global $post;

    $author_id    = get_the_author_meta('ID', $post->post_author );
    $author_email = get_the_author_meta( 'user_email', $author_id );
    
    return $author_email;
}

/**
 * Returns the Gravatar URL
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @uses TEMPLATE_get_user_email()
 * @param  [string] $size [specify a size]
 * @return [type]       [description]
 */
function TEMPLATE_get_gravatar_url( $size )
{
    $size = isset( $size ) ? $size : 100;
     
    $grav_url = 'https://www.gravatar.com/avatar/' . md5( strtolower( TEMPLATE_get_user_email() ) ) . '?s=' . $size;

    return $grav_url;
}



/**
 * Add classes to next_posts_link() via filter
 *
 * @since 1.0
 * @author Fifty and Fifty
 * @return [string] 
 */
function posts_link_attributes() {
    return 'class="icon icon-arrow-circle-o-down more-posts"';
}
//add_filter('next_posts_link_attributes', 'posts_link_attributes');



/**
 * Set ACP Options Page Title
 */
if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Imagination Foundation Options') );
}

if( function_exists('acf_set_options_page_menu') )
{
    acf_set_options_page_menu( __('IF Options') );
}