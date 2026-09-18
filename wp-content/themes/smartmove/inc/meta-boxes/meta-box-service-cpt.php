<?php
/**
 * "Service FAQs" meta box — service CPT.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function smartmove_add_service_faq_metabox() {
    add_meta_box(
        'smartmove_service_faqs',
        'Service FAQs',
        'smartmove_render_service_faq_metabox',
        'service',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_service_faq_metabox' );

function smartmove_render_service_faq_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_service_faqs', 'smartmove_service_faqs_nonce' );
    smartmove_field_faq_repeater( 'service_faqs', get_post_meta( $post->ID, 'service_faqs', true ) );
}

function smartmove_save_service_faqs_meta( $post_id ) {
    if ( ! smartmove_verify_save( $post_id, 'smartmove_service_faqs_nonce', 'smartmove_save_service_faqs' ) ) {
        return;
    }
    smartmove_save_faq_repeater( $post_id, 'service_faqs' );
}
add_action( 'save_post_service', 'smartmove_save_service_faqs_meta' );
