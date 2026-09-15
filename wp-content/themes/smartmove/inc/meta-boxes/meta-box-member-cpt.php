<?php
/**
 * "Member Details" meta box — member CPT.
 * Replaces the ACF "Members" field group.
 * Templates already read `designation` via raw get_post_meta(),
 * so this only needs to provide an editor UI, no template change.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function smartmove_add_member_metabox() {
    add_meta_box(
        'smartmove_member_details',
        'Member Details',
        'smartmove_render_member_metabox',
        'member',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_member_metabox' );

function smartmove_render_member_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_member', 'smartmove_member_nonce' );
    smartmove_field_text( 'designation', 'Designation', get_post_meta( $post->ID, 'designation', true ) );
}

function smartmove_save_member_meta( $post_id ) {
    if ( ! smartmove_verify_save( $post_id, 'smartmove_member_nonce', 'smartmove_save_member' ) ) {
        return;
    }
    if ( isset( $_POST['designation'] ) ) {
        update_post_meta( $post_id, 'designation', sanitize_text_field( wp_unslash( $_POST['designation'] ) ) );
    }
}
add_action( 'save_post_member', 'smartmove_save_member_meta' );
