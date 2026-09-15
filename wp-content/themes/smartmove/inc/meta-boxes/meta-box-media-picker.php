<?php
/**
 * Shared image-picker field. Stores an attachment ID in postmeta
 * (same as ACF's image fields already do), using the native
 * wp.media library for selection.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function smartmove_field_image( $key, $label, $attachment_id ) {
    $attachment_id = absint( $attachment_id );
    $url = $attachment_id ? wp_get_attachment_image_url( $attachment_id, 'medium' ) : '';
    ?>
    <div class="smartmove-mb-field smartmove-image-field" data-target="<?php echo esc_attr( $key ); ?>">
        <label><strong><?php echo esc_html( $label ); ?></strong></label><br>
        <input type="hidden" class="smartmove-image-id" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $attachment_id ); ?>">
        <img class="smartmove-image-preview" src="<?php echo esc_url( $url ); ?>" style="<?php echo $url ? '' : 'display:none;'; ?>max-width:150px;height:auto;display:block;margin-bottom:6px;">
        <button type="button" class="button smartmove-image-select"><?php echo $url ? esc_html__( 'Change Image' ) : esc_html__( 'Select Image' ); ?></button>
        <button type="button" class="button smartmove-image-remove" style="<?php echo $url ? '' : 'display:none;'; ?>"><?php esc_html_e( 'Remove' ); ?></button>
    </div>
    <?php
}
