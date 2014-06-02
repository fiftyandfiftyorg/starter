<?php
/**
 * Metabox Added Functions
 *
 * @package     IMAG
 * @subpackage  Functions/Slides
 * @copyright   Copyright (c) 2014, Fifty and Fifty
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Select button for the different styles. 
 *
 * @author Fifty and Fifty <[email]>
 * @return [void] [description]
 */
function TEMPLATE_add_slide_fields()
{
    global $post;

    $TEMPLATE_colors    = get_post_meta( $post->ID, 'TEMPLATE_colors', true );
    $TEMPLATE_link      = get_post_meta( $post->ID, 'TEMPLATE_link', true );
    $TEMPLATE_link_text = get_post_meta( $post->ID, 'TEMPLATE_link_text', true );

    ob_start(); ?>

    <tr>
        <td style="width:30%;"><p><strong>Base Color</p></strong></td>
        <td>
            <label for="TEMPLATE_colors">
            <select name="TEMPLATE_colors">
                <option value="blue-bg"<?php selected( $TEMPLATE_colors, 'blue-bg' ); ?>>Blue</option>
                <option value="yellow-bg" <?php selected( $TEMPLATE_colors, 'yellow-bg' ); ?>>Yellow</option>
            </select>
        <td>
    </tr>

    <tr>
        <td style="width:30%;"><p><strong>Slide Link</strong></p></td>
        <td>
            <label for="TEMPLATE_link">
                <input type="text" name="TEMPLATE_link" id="TEMPLATE_link" value="<?php echo $TEMPLATE_link; ?>">
            </label>
        </td>
    </tr>

    <tr>
        <td style="width:30%;"><p><strong>Slide Link Text</strong></p></td>
        <td>
            <label for="TEMPLATE_link_text">
                <input type="text" name="TEMPLATE_link_text" id="TEMPLATE_link_text" value="<?php echo $TEMPLATE_link_text; ?>">
            </label>
        </td>
    </tr>



<?php
    $TEMPLATE_colors = ob_get_clean();

    echo $TEMPLATE_colors;

}
add_action( 'ffw_before_slides_row', 'TEMPLATE_add_slide_fields' );



/**
 * Add some fields to the array to save
 *
 * @author Fifty and Fifty
 * @param  [type] $fields [description]
 * @return [array]         [description]
 */
function TEMPLATE_add_fields_array( $fields )
{
    $fields[] = 'TEMPLATE_colors';
    $fields[] = 'TEMPLATE_link';
    $fields[] = 'TEMPLATE_link_text';
    
    return $fields;
}
add_filter( 'ffw_slides_metabox_fields_save', 'TEMPLATE_add_fields_array' );