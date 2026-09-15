<?php
/**
 * "Services Page Settings" meta box — page ID 276 (template servicespage.php).
 * Replaces the ACF "Services Page Settings" field group.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SMARTMOVE_SERVICESPAGE_ID', 276 );

function smartmove_add_servicespage_metabox() {
    $screen = get_current_screen();
    if ( ! $screen || 'page' !== $screen->post_type ) {
        return;
    }
    if ( ! isset( $_GET['post'] ) || (int) $_GET['post'] !== SMARTMOVE_SERVICESPAGE_ID ) {
        return;
    }
    add_meta_box(
        'smartmove_servicespage_settings',
        'Services Page Settings',
        'smartmove_render_servicespage_metabox',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_servicespage_metabox' );

function smartmove_render_servicespage_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_servicespage', 'smartmove_servicespage_nonce' );
    $id = $post->ID;

    smartmove_section_open( 'Page Banner' );
        smartmove_field_text( 'banner_small_title', 'Small Title', get_post_meta( $id, 'banner_small_title', true ) );
        smartmove_field_text( 'banner_title', 'Title', get_post_meta( $id, 'banner_title', true ) );
        smartmove_field_textarea( 'banner_content', 'Content', get_post_meta( $id, 'banner_content', true ) );
        smartmove_field_image( 'banner_image', 'Image', get_post_meta( $id, 'banner_image', true ) );
    smartmove_section_close();
}

function smartmove_save_servicespage_meta( $post_id ) {
    if ( (int) $post_id !== SMARTMOVE_SERVICESPAGE_ID ) {
        return;
    }
    if ( ! smartmove_verify_save( $post_id, 'smartmove_servicespage_nonce', 'smartmove_save_servicespage' ) ) {
        return;
    }

    foreach ( array( 'banner_small_title', 'banner_title' ) as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
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
add_action( 'save_post_page', 'smartmove_save_servicespage_meta' );
