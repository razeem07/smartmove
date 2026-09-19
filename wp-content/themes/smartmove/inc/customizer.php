<?php
function mytheme_customize_register( $wp_customize ) {

    // Add Section
    $wp_customize->add_section( 'mytheme_contact_section', [
        'title'       => __( 'Contact Info', 'mytheme' ),
        'priority'    => 30,
        'description' => __( 'Update your contact details here.', 'mytheme' ),
    ] );

    // Add Setting (Phone Number)
    $wp_customize->add_setting( 'mytheme_phone_number', [
        'default'           => '+971 55 341 5371',
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    // Add Control (Phone Number Input)
    $wp_customize->add_control( 'mytheme_phone_number_control', [
        'label'    => __( 'Phone Number', 'mytheme' ),
        'section'  => 'mytheme_contact_section',
        'settings' => 'mytheme_phone_number',
        'type'     => 'text',
    ] );

}
add_action( 'customize_register', 'mytheme_customize_register' );


function mytheme_footer_customize_register( $wp_customize ) {

    // === Search Engine Visibility ===
    $wp_customize->add_section( 'smartmove_seo_visibility', array(
        'title'       => __( 'Search Engine Visibility', 'mytheme' ),
        'description' => __( 'Tick this on staging/test copies only. On the live site it removes every page from Google.', 'mytheme' ),
        'priority'    => 45,
    ) );
    $wp_customize->add_setting( 'hide_from_search_engines', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ) );
    $wp_customize->add_control( 'hide_from_search_engines', array(
        'label'   => __( 'Hide site from search engines (noindex, nofollow)', 'mytheme' ),
        'section' => 'smartmove_seo_visibility',
        'type'    => 'checkbox',
    ) );

    // === Footer Section ===
    $wp_customize->add_section( 'footer_settings', array(
        'title'    => __( 'Footer Settings', 'mytheme' ),
        'priority' => 40,
    ) );

    // Footer Logo
    $wp_customize->add_setting( 'footer_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label'    => __( 'Footer Logo', 'mytheme' ),
        'section'  => 'footer_settings',
        'settings' => 'footer_logo',
    ) ) );

    // Footer Description
    $wp_customize->add_setting( 'footer_description', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'footer_description', array(
        'label'   => __( 'Footer Description', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'textarea',
    ) );

    // Address
    $wp_customize->add_setting( 'footer_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_address', array(
        'label'   => __( 'Address', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'text',
    ) );

    // Phone
    $wp_customize->add_setting( 'footer_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_phone', array(
        'label'   => __( 'Phone Number', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'text',
    ) );

    // WhatsApp
    $wp_customize->add_setting( 'footer_whatsapp', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_whatsapp', array(
        'label'   => __( 'WhatsApp Number', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'footer_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'footer_email', array(
        'label'   => __( 'Email Address', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'email',
    ) );

    // Second Email
    $wp_customize->add_setting( 'footer_email_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'footer_email_2', array(
        'label'   => __( 'Second Email Address', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'email',
    ) );

    // Social Links
    $socials = array( 'facebook', 'instagram', 'twitter', 'linkedin' );
    foreach ( $socials as $social ) {
        $wp_customize->add_setting( "footer_{$social}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "footer_{$social}", array(
            'label'   => ucfirst( $social ) . ' URL',
            'section' => 'footer_settings',
            'type'    => 'url',
        ) );



 // Copyright Text
    $wp_customize->add_setting( 'footer_copyright', array(
        'default' => '© ' . date("Y") . ' Prominent Leisure. All Rights Reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'footer_copyright', array(
        'label'   => __( 'Copyright Text', 'mytheme' ),
        'section' => 'footer_settings',
        'type'    => 'text',
    ) );

    }

}
add_action( 'customize_register', 'mytheme_footer_customize_register' );




function bleizure_customize_register( $wp_customize ) {

    // Panel for Fleet Features
    $wp_customize->add_section('fleet_features_section', array(
        'title'    => __('Fleet Features', 'bleizure'),
        'priority' => 30,
    ));

    // Loop for 4 features
    for ($i = 1; $i <= 4; $i++) {

        // Icon
        $wp_customize->add_setting("fleet_feature_icon_$i", array(
            'default'   => 'bi bi-star',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("fleet_feature_icon_$i", array(
            'label'   => __("Feature {$i} Icon (Bootstrap class)", 'bleizure'),
            'section' => 'fleet_features_section',
            'type'    => 'text',
        ));

        // Heading
        $wp_customize->add_setting("fleet_feature_heading_$i", array(
            'default'   => "Feature {$i} Heading",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("fleet_feature_heading_$i", array(
            'label'   => __("Feature {$i} Heading", 'bleizure'),
            'section' => 'fleet_features_section',
            'type'    => 'text',
        ));

        // Description
        $wp_customize->add_setting("fleet_feature_desc_$i", array(
            'default'   => "Feature {$i} description goes here.",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("fleet_feature_desc_$i", array(
            'label'   => __("Feature {$i} Description", 'bleizure'),
            'section' => 'fleet_features_section',
            'type'    => 'textarea',
        ));
    }
}
add_action('customize_register', 'bleizure_customize_register');




function mytheme_banner_register( $wp_customize ) {

    // Panel for Archive Banners
    $wp_customize->add_panel( 'archive_banners_panel', array(
        'title'       => __( 'Archive Banners', 'mytheme' ),
        'priority'    => 30,
        'description' => __( 'Manage banners for archive pages', 'mytheme' ),
    ));

    // Destination
    //$wp_customize->add_section( 'destination_banner', array(
    //    'title' => __( 'Destination Banner', 'mytheme' ),
    //    'panel' => 'archive_banners_panel',
    //));
    $wp_customize->add_setting( 'destination_banner_title', array( 'default' => 'Our Destinations' ));
    $wp_customize->add_setting( 'destination_banner_desc', array( 'default' => 'Explore the Travel Destinations with Us' ));
    $wp_customize->add_setting( 'destination_banner_image', array( 'default' => get_template_directory_uri() . '/assets/images/destination-banner.jpg' ));
    $wp_customize->add_control( 'destination_banner_title', array(
        'label' => 'Title', 'section' => 'destination_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( 'destination_banner_desc', array(
        'label' => 'Description', 'section' => 'destination_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'destination_banner_image', array(
            'label'    => 'Banner Image',
            'section'  => 'destination_banner',
            'settings' => 'destination_banner_image'
        )
    ));

    // Fleet
    $wp_customize->add_section( 'fleet_banner', array(
        'title' => __( 'Fleet Banner', 'mytheme' ),
        'panel' => 'archive_banners_panel',
    ));
    $wp_customize->add_setting( 'fleet_banner_title', array( 'default' => 'Our Fleet' ));
    $wp_customize->add_setting( 'fleet_banner_desc', array( 'default' => 'Discover Our Premium Vehicles' ));
    $wp_customize->add_setting( 'fleet_banner_image', array( 'default' => get_template_directory_uri() . '/assets/images/fleet-banner.jpg' ));
    $wp_customize->add_control( 'fleet_banner_title', array(
        'label' => 'Title', 'section' => 'fleet_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( 'fleet_banner_desc', array(
        'label' => 'Description', 'section' => 'fleet_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'fleet_banner_image', array(
            'label'    => 'Banner Image',
            'section'  => 'fleet_banner',
            'settings' => 'fleet_banner_image'
        )
    ));

    // Transport
    //$wp_customize->add_section( 'transport_banner', array(
    //    'title' => __( 'Transport Banner', 'mytheme' ),
    //    'panel' => 'archive_banners_panel',
    //));
    $wp_customize->add_setting( 'transport_banner_title', array( 'default' => 'Transport Services' ));
    $wp_customize->add_setting( 'transport_banner_desc', array( 'default' => 'Seamless Travel for Every Occasion' ));
    $wp_customize->add_setting( 'transport_banner_image', array( 'default' => get_template_directory_uri() . '/assets/images/transport-banner.jpg' ));
    $wp_customize->add_control( 'transport_banner_title', array(
        'label' => 'Title', 'section' => 'transport_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( 'transport_banner_desc', array(
        'label' => 'Description', 'section' => 'transport_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'transport_banner_image', array(
            'label'    => 'Banner Image',
            'section'  => 'transport_banner',
            'settings' => 'transport_banner_image'
        )
    ));

    // Blog
    $wp_customize->add_section( 'blog_banner', array(
        'title' => __( 'Blog Banner', 'mytheme' ),
        'panel' => 'archive_banners_panel',
    ));
    $wp_customize->add_setting( 'blog_banner_title', array( 'default' => 'Our Blog' ));
    $wp_customize->add_setting( 'blog_banner_desc', array( 'default' => 'Latest Updates, Travel Tips & News' ));
    $wp_customize->add_setting( 'blog_banner_image', array( 'default' => get_template_directory_uri() . '/assets/images/blog-banner.jpg' ));
    $wp_customize->add_control( 'blog_banner_title', array(
        'label' => 'Title', 'section' => 'blog_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( 'blog_banner_desc', array(
        'label' => 'Description', 'section' => 'blog_banner', 'type' => 'text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'blog_banner_image', array(
            'label'    => 'Banner Image',
            'section'  => 'blog_banner',
            'settings' => 'blog_banner_image'
        )
    ));
}
add_action( 'customize_register', 'mytheme_banner_register' );





