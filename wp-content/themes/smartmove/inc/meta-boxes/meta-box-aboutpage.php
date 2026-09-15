<?php
/**
 * "AboutUs Page Settings" meta box — page ID 178 (template aboutpage.php).
 * Replaces the ACF "AboutUs Page Settings" field group.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SMARTMOVE_ABOUTPAGE_ID', 178 );

function smartmove_add_aboutpage_metabox() {
    $screen = get_current_screen();
    if ( ! $screen || 'page' !== $screen->post_type ) {
        return;
    }
    if ( ! isset( $_GET['post'] ) || (int) $_GET['post'] !== SMARTMOVE_ABOUTPAGE_ID ) {
        return;
    }
    add_meta_box(
        'smartmove_aboutpage_settings',
        'AboutUs Page Settings',
        'smartmove_render_aboutpage_metabox',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_aboutpage_metabox' );

function smartmove_render_aboutpage_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_aboutpage', 'smartmove_aboutpage_nonce' );
    $id = $post->ID;

    smartmove_section_open( 'Page Banner' );
        smartmove_field_text( 'banner_small_title', 'Small Title', get_post_meta( $id, 'banner_small_title', true ) );
        smartmove_field_text( 'banner_title', 'Title', get_post_meta( $id, 'banner_title', true ) );
        smartmove_field_textarea( 'banner_content', 'Content', get_post_meta( $id, 'banner_content', true ) );
        smartmove_field_image( 'banner_image', 'Image', get_post_meta( $id, 'banner_image', true ) );
    smartmove_section_close();

    smartmove_section_open( 'About Us' );
        smartmove_field_text( 'about_us_title', 'Title', get_post_meta( $id, 'about_us_title', true ) );
        smartmove_field_textarea( 'about_us_content', 'Content', get_post_meta( $id, 'about_us_content', true ) );
        for ( $i = 1; $i <= 2; $i++ ) {
            smartmove_subsection_open( "Card {$i}" );
                smartmove_field_text( "about_us_card_{$i}_title", 'Title', get_post_meta( $id, "about_us_card_{$i}_title", true ) );
                smartmove_field_textarea( "about_us_card_{$i}_content", 'Content', get_post_meta( $id, "about_us_card_{$i}_content", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Services' );
        smartmove_field_image( 'services_banner_image', 'Banner Image', get_post_meta( $id, 'services_banner_image', true ) );
        for ( $i = 1; $i <= 4; $i++ ) {
            smartmove_subsection_open( "Service {$i}" );
                smartmove_field_icon( "services_service_{$i}_icon", 'Icon', get_post_meta( $id, "services_service_{$i}_icon", true ) );
                smartmove_field_text( "services_service_{$i}_title", 'Title', get_post_meta( $id, "services_service_{$i}_title", true ) );
                smartmove_field_textarea( "services_service_{$i}_content", 'Content', get_post_meta( $id, "services_service_{$i}_content", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Our Premium Features' );
        smartmove_field_text( 'our_premium_features_title', 'Title', get_post_meta( $id, 'our_premium_features_title', true ) );
        for ( $i = 1; $i <= 3; $i++ ) {
            smartmove_subsection_open( "Card {$i}" );
                smartmove_field_icon( "our_premium_features_card_{$i}_icon", 'Icon', get_post_meta( $id, "our_premium_features_card_{$i}_icon", true ) );
                smartmove_field_text( "our_premium_features_card_{$i}_title", 'Title', get_post_meta( $id, "our_premium_features_card_{$i}_title", true ) );
                smartmove_field_textarea( "our_premium_features_card_{$i}_content", 'Content', get_post_meta( $id, "our_premium_features_card_{$i}_content", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Mission & Vision' );
        smartmove_field_image( 'mission_vision_banner_image', 'Banner Image', get_post_meta( $id, 'mission_vision_banner_image', true ) );
        smartmove_field_text( 'mission_vision_start_year', 'Start Year', get_post_meta( $id, 'mission_vision_start_year', true ) );
        smartmove_field_text( 'mission_vision_title', 'Title', get_post_meta( $id, 'mission_vision_title', true ) );
        smartmove_field_textarea( 'mission_vision_mission', 'Mission', get_post_meta( $id, 'mission_vision_mission', true ) );
        smartmove_field_textarea( 'mission_vision_vision', 'Vision', get_post_meta( $id, 'mission_vision_vision', true ) );
    smartmove_section_close();
}

function smartmove_save_aboutpage_meta( $post_id ) {
    if ( (int) $post_id !== SMARTMOVE_ABOUTPAGE_ID ) {
        return;
    }
    if ( ! smartmove_verify_save( $post_id, 'smartmove_aboutpage_nonce', 'smartmove_save_aboutpage' ) ) {
        return;
    }

    $text_fields = array( 'banner_small_title', 'banner_title', 'about_us_title', 'our_premium_features_title', 'mission_vision_start_year', 'mission_vision_title' );
    $textarea_fields = array( 'banner_content', 'about_us_content', 'mission_vision_mission', 'mission_vision_vision' );
    $icon_fields = array();
    $image_fields = array( 'banner_image', 'services_banner_image', 'mission_vision_banner_image' );

    for ( $i = 1; $i <= 2; $i++ ) {
        $text_fields[]     = "about_us_card_{$i}_title";
        $textarea_fields[] = "about_us_card_{$i}_content";
    }
    for ( $i = 1; $i <= 4; $i++ ) {
        $icon_fields[]     = "services_service_{$i}_icon";
        $text_fields[]     = "services_service_{$i}_title";
        $textarea_fields[] = "services_service_{$i}_content";
    }
    for ( $i = 1; $i <= 3; $i++ ) {
        $icon_fields[]     = "our_premium_features_card_{$i}_icon";
        $text_fields[]     = "our_premium_features_card_{$i}_title";
        $textarea_fields[] = "our_premium_features_card_{$i}_content";
    }

    foreach ( $text_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
    foreach ( $textarea_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
    foreach ( $icon_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
    foreach ( $image_fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            $attachment_id = absint( $_POST[ $key ] );
            if ( $attachment_id ) {
                update_post_meta( $post_id, $key, $attachment_id );
            } else {
                delete_post_meta( $post_id, $key );
            }
        }
    }
}
add_action( 'save_post_page', 'smartmove_save_aboutpage_meta' );
