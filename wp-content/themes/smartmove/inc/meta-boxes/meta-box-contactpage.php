<?php
/**
 * "Contact Us Page Settings" meta box — page ID 407 (template contactpage.php).
 * Replaces the ACF "Contact Us Page Settings" field group.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SMARTMOVE_CONTACTPAGE_ID', 407 );

function smartmove_add_contactpage_metabox() {
    $screen = get_current_screen();
    if ( ! $screen || 'page' !== $screen->post_type ) {
        return;
    }
    if ( ! isset( $_GET['post'] ) || (int) $_GET['post'] !== SMARTMOVE_CONTACTPAGE_ID ) {
        return;
    }
    add_meta_box(
        'smartmove_contactpage_settings',
        'Contact Us Page Settings',
        'smartmove_render_contactpage_metabox',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_contactpage_metabox' );

function smartmove_render_contactpage_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_contactpage', 'smartmove_contactpage_nonce' );
    $id = $post->ID;

    smartmove_section_open( 'Page Banner' );
        smartmove_field_text( 'banner_small_title', 'Small Title', get_post_meta( $id, 'banner_small_title', true ) );
        smartmove_field_text( 'banner_title', 'Title', get_post_meta( $id, 'banner_title', true ) );
        smartmove_field_textarea( 'banner_content', 'Content', get_post_meta( $id, 'banner_content', true ) );
        smartmove_field_image( 'banner_image', 'Image', get_post_meta( $id, 'banner_image', true ) );
    smartmove_section_close();

    smartmove_section_open( 'Map' );
        smartmove_field_text( 'google_map', 'Google Map Embed URL', get_post_meta( $id, 'google_map', true ) );
    smartmove_section_close();
}

function smartmove_save_contactpage_meta( $post_id ) {
    if ( (int) $post_id !== SMARTMOVE_CONTACTPAGE_ID ) {
        return;
    }
    if ( ! smartmove_verify_save( $post_id, 'smartmove_contactpage_nonce', 'smartmove_save_contactpage' ) ) {
        return;
    }

    foreach ( array( 'banner_small_title', 'banner_title' ) as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
    if ( isset( $_POST['google_map'] ) ) {
        update_post_meta( $post_id, 'google_map', esc_url_raw( wp_unslash( $_POST['google_map'] ) ) );
    }
    if ( isset( $_POST['banner_content'] ) ) {
        update_post_meta( $post_id, 'banner_content', sanitize_textarea_field( wp_unslash( $_POST['banner_content'] ) ) );
    }
    if ( isset( $_POST['banner_image'] ) ) {
        $attachment_id = absint( $_POST['banner_image'] );
        if ( $attachment_id ) {
            update_post_meta( $post_id, 'banner_image', $attachment_id );
        } else {
            delete_post_meta( $post_id, 'banner_image' );
        }
    }
}
add_action( 'save_post_page', 'smartmove_save_contactpage_meta' );
