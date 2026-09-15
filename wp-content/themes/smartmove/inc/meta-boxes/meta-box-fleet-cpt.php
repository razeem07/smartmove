<?php
/**
 * "Fleet Details" meta box — fleet CPT.
 * Replaces the ACF "Fleets Extra Fields" field group.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function smartmove_add_fleet_metabox() {
    add_meta_box(
        'smartmove_fleet_details',
        'Fleet Details',
        'smartmove_render_fleet_metabox',
        'fleet',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'smartmove_add_fleet_metabox' );

function smartmove_render_fleet_metabox( $post ) {
    wp_nonce_field( 'smartmove_save_fleet', 'smartmove_fleet_nonce' );
    $id = $post->ID;

    smartmove_field_text( 'number_of_seats', 'Number of Seats', get_post_meta( $id, 'number_of_seats', true ) );
    smartmove_field_text( 'number_of_doors', 'Number of Doors', get_post_meta( $id, 'number_of_doors', true ) );
    smartmove_field_text( 'color', 'Color', get_post_meta( $id, 'color', true ) );
    smartmove_field_text( 'hourly', 'Half Day Rate', get_post_meta( $id, 'hourly', true ) );
    smartmove_field_text( 'full_day', 'Full Day Rate', get_post_meta( $id, 'full_day', true ) );
}

function smartmove_save_fleet_meta( $post_id ) {
    if ( ! smartmove_verify_save( $post_id, 'smartmove_fleet_nonce', 'smartmove_save_fleet' ) ) {
        return;
    }

    $fields = array( 'number_of_seats', 'number_of_doors', 'color', 'hourly', 'full_day' );
    foreach ( $fields as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
}
add_action( 'save_post_fleet', 'smartmove_save_fleet_meta' );
