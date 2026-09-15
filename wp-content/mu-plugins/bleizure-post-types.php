<?php
// =======================
// 1. FAQ CPT (kept)
// =======================
function register_cpt_faq() {
    $labels = array(
        'name' => 'FAQs',
        'singular_name' => 'FAQ',
        'menu_name' => 'FAQs',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New FAQ',
        'edit_item' => 'Edit FAQ',
        'view_item' => 'View FAQ',
        'search_items' => 'Search FAQs',
        'not_found' => 'No FAQs found',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array('title', 'editor'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'faq'),
        'show_in_rest' => true,
    );
    register_post_type('faq', $args);
}
add_action('init', 'register_cpt_faq');

// =======================
// 2. Native replacements for ACF-registered post types
// (fleet, testimonial, member, service, partner, brand)
// These were previously registered by the Advanced Custom
// Fields plugin's own "Post Types" UI feature. Registering
// them here natively means they keep working once ACF is
// removed. While ACF is still active, both registrations
// exist harmlessly side by side (ACF's runs after this one
// on the same 'init' hook and simply takes precedence until
// ACF is deactivated).
// =======================
function smartmove_build_cpt_labels( $plural, $singular ) {
    return array(
        'name'                  => $plural,
        'singular_name'         => $singular,
        'menu_name'             => $plural,
        'all_items'             => 'All ' . $plural,
        'edit_item'             => 'Edit ' . $singular,
        'view_item'             => 'View ' . $singular,
        'view_items'            => 'View ' . $plural,
        'add_new_item'          => 'Add New ' . $singular,
        'add_new'               => 'Add New ' . $singular,
        'new_item'              => 'New ' . $singular,
        'parent_item_colon'     => 'Parent ' . $singular . ':',
        'search_items'          => 'Search ' . $plural,
        'not_found'             => 'No ' . strtolower( $plural ) . ' found',
        'not_found_in_trash'    => 'No ' . strtolower( $plural ) . ' found in Trash',
        'archives'              => $singular . ' Archives',
        'attributes'            => $singular . ' Attributes',
        'insert_into_item'      => 'Insert into ' . strtolower( $singular ),
        'uploaded_to_this_item' => 'Uploaded to this ' . strtolower( $singular ),
        'filter_items_list'     => 'Filter ' . strtolower( $plural ) . ' list',
        'items_list_navigation' => $plural . ' list navigation',
        'items_list'            => $plural . ' list',
    );
}

function smartmove_register_native_post_types() {
    $common_args = array(
        'public'             => true,
        'hierarchical'       => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-admin-post',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'has_archive'        => false,
        'can_export'         => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
    );

    register_post_type( 'fleet', array_merge( $common_args, array(
        'labels'    => smartmove_build_cpt_labels( 'Fleets', 'Fleet' ),
        'taxonomies'=> array( 'category' ),
        'rewrite'   => array( 'slug' => 'fleet', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );

    register_post_type( 'testimonial', array_merge( $common_args, array(
        'labels'  => smartmove_build_cpt_labels( 'Testimonials', 'Testimonial' ),
        'rewrite' => array( 'slug' => 'testimonial', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );

    register_post_type( 'member', array_merge( $common_args, array(
        'labels'  => smartmove_build_cpt_labels( 'Members', 'Member' ),
        'rewrite' => array( 'slug' => 'member', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );

    register_post_type( 'service', array_merge( $common_args, array(
        'labels'  => smartmove_build_cpt_labels( 'Services', 'Service' ),
        'rewrite' => array( 'slug' => 'service', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );

    register_post_type( 'partner', array_merge( $common_args, array(
        'labels'  => smartmove_build_cpt_labels( 'Partners', 'Partner' ),
        'rewrite' => array( 'slug' => 'partner', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );

    register_post_type( 'brand', array_merge( $common_args, array(
        'labels'  => smartmove_build_cpt_labels( 'Brands', 'Brand' ),
        'rewrite' => array( 'slug' => 'brand', 'with_front' => true, 'feeds' => false, 'pages' => true ),
    ) ) );
}
add_action('init', 'smartmove_register_native_post_types');
