<?php
/**
 * "HomePage Settings" meta box — page ID 7 (template homepage.php).
 * Replaces the ACF "HomePage Settings" field group.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SMARTMOVE_HOMEPAGE_ID', 7 );

function smartmove_add_homepage_metabox() {
    $screen = get_current_screen();
    if ( ! $screen || 'page' !== $screen->post_type ) {
        return;
    }
    if ( ! isset( $_GET['post'] ) || (int) $_GET['post'] !== SMARTMOVE_HOMEPAGE_ID ) {
        return;
    }
    add_meta_box(
        'smartmove_homepage_settings',
        'HomePage Settings',
        'smartmove_render_homepage_metabox',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_homepage_metabox' );

function smartmove_render_homepage_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_homepage', 'smartmove_homepage_nonce' );
    $id = $post->ID;

    smartmove_section_open( 'Hero Banner' );
        for ( $i = 1; $i <= 3; $i++ ) {
            smartmove_subsection_open( "Banner {$i}" );
                smartmove_field_text( "hero_banner_banner_{$i}_title", 'Title', get_post_meta( $id, "hero_banner_banner_{$i}_title", true ) );
                smartmove_field_textarea( "hero_banner_banner_{$i}_description", 'Description', get_post_meta( $id, "hero_banner_banner_{$i}_description", true ) );
                smartmove_field_image( "hero_banner_banner_{$i}_image", 'Image', get_post_meta( $id, "hero_banner_banner_{$i}_image", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Who We Are' );
        smartmove_field_text( 'aboutus_section_main_title', 'Main Title', get_post_meta( $id, 'aboutus_section_main_title', true ) );
        smartmove_field_image( 'aboutus_section_image', 'Image', get_post_meta( $id, 'aboutus_section_image', true ) );
        smartmove_field_text( 'aboutus_section_title', 'Title', get_post_meta( $id, 'aboutus_section_title', true ) );
        smartmove_field_textarea( 'aboutus_section_content', 'Content', get_post_meta( $id, 'aboutus_section_content', true ), 8 );
        smartmove_field_text( 'aboutus_section_cards_heading', 'Cards Heading (above the 4 cards)', get_post_meta( $id, 'aboutus_section_cards_heading', true ) );
        for ( $i = 1; $i <= 4; $i++ ) {
            smartmove_subsection_open( "Card {$i}" );
                smartmove_field_text( "aboutus_section_cards_card_{$i}_title", 'Title', get_post_meta( $id, "aboutus_section_cards_card_{$i}_title", true ) );
                smartmove_field_textarea( "aboutus_section_cards_card_{$i}_content", 'Content', get_post_meta( $id, "aboutus_section_cards_card_{$i}_content", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Exclusive Rental Section' );
        smartmove_field_image( 'exclusive_rental_section_banner_image', 'Banner Image', get_post_meta( $id, 'exclusive_rental_section_banner_image', true ) );
        smartmove_field_text( 'exclusive_rental_section_main_title', 'Main Title', get_post_meta( $id, 'exclusive_rental_section_main_title', true ) );
        smartmove_field_textarea( 'exclusive_rental_section_content', 'Content', get_post_meta( $id, 'exclusive_rental_section_content', true ) );
        smartmove_field_text( 'exclusive_rental_section_book_link', 'Book Link', get_post_meta( $id, 'exclusive_rental_section_book_link', true ) );
        for ( $i = 1; $i <= 4; $i++ ) {
            smartmove_subsection_open( "Card {$i}" );
                smartmove_field_icon( "exclusive_rental_section_cards_card_{$i}_icon", 'Icon', get_post_meta( $id, "exclusive_rental_section_cards_card_{$i}_icon", true ) );
                smartmove_field_text( "exclusive_rental_section_cards_card_{$i}_title", 'Title', get_post_meta( $id, "exclusive_rental_section_cards_card_{$i}_title", true ) );
                smartmove_field_textarea( "exclusive_rental_section_cards_card_{$i}_content", 'Content', get_post_meta( $id, "exclusive_rental_section_cards_card_{$i}_content", true ) );
            smartmove_subsection_close();
        }
    smartmove_section_close();

    smartmove_section_open( 'Testimonials' );
        smartmove_field_image( 'testimonials_banner_image', 'Banner Image', get_post_meta( $id, 'testimonials_banner_image', true ) );
    smartmove_section_close();
}

function smartmove_save_homepage_meta( $post_id ) {
    if ( (int) $post_id !== SMARTMOVE_HOMEPAGE_ID ) {
        return;
    }
    if ( ! smartmove_verify_save( $post_id, 'smartmove_homepage_nonce', 'smartmove_save_homepage' ) ) {
        return;
    }

    $text_fields = array();
    $textarea_fields = array();
    $icon_fields = array();
    $image_fields = array();

    for ( $i = 1; $i <= 3; $i++ ) {
        $text_fields[]     = "hero_banner_banner_{$i}_title";
        $textarea_fields[] = "hero_banner_banner_{$i}_description";
        $image_fields[]    = "hero_banner_banner_{$i}_image";
    }

    $text_fields[]     = 'aboutus_section_main_title';
    $text_fields[]     = 'aboutus_section_title';
    $text_fields[]     = 'aboutus_section_cards_heading';
    $textarea_fields[] = 'aboutus_section_content';
    $image_fields[]    = 'aboutus_section_image';
    for ( $i = 1; $i <= 4; $i++ ) {
        $text_fields[]     = "aboutus_section_cards_card_{$i}_title";
        $textarea_fields[] = "aboutus_section_cards_card_{$i}_content";
    }

    $text_fields[]     = 'exclusive_rental_section_main_title';
    $text_fields[]     = 'exclusive_rental_section_book_link';
    $textarea_fields[] = 'exclusive_rental_section_content';
    $image_fields[]    = 'exclusive_rental_section_banner_image';
    for ( $i = 1; $i <= 4; $i++ ) {
        $icon_fields[]     = "exclusive_rental_section_cards_card_{$i}_icon";
        $text_fields[]     = "exclusive_rental_section_cards_card_{$i}_title";
        $textarea_fields[] = "exclusive_rental_section_cards_card_{$i}_content";
    }

    $image_fields[] = 'testimonials_banner_image';

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
add_action( 'save_post_page', 'smartmove_save_homepage_meta' );
