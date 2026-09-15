<?php
// Default fallback values
$banner_image = get_template_directory_uri() . '/assets/images/banner-inner.jpg';
$banner_title = 'Our Services';
$banner_desc  = 'Explore more with us';
$banner_small_title = 'Our Legacy';

// Destination
if ( get_post_type() == 'fleet' ) {
    $banner_title = get_theme_mod('fleet_banner_title', 'Our Fleet');
    $banner_desc  = get_theme_mod('fleet_banner_desc', 'Discover Our Premium Vehicles');
    $banner_image = get_theme_mod('fleet_banner_image', '../../../../wp-content/uploads/2026/04/fleets-banner-single.jpg');
	$banner_small_title = "Our Legacy";

} elseif ( get_post_type() == 'post' ) {
    $banner_title = get_theme_mod('blog_banner_title', 'Our Blog');
    $banner_desc  = get_theme_mod('blog_banner_desc', 'Latest Updates, Travel Tips & News');
    $banner_image = get_theme_mod('blog_banner_image', get_template_directory_uri() . '/assets/images/blog-banner.jpg');
}
?>

<!-- Archive Banner Section -->
<section class="about-banner-compact">
    <!-- The background image container -->
    <div class="banner-image-wrapper" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
        <div class="banner-overlay-gradient"></div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-content-box">
                    <div class="section-title">
                        <span class="section-title__tagline"><?php echo esc_html( $banner_small_title ); ?></span>
                        <h2 class="compact-title fade-left">
                           <?php echo esc_html( $banner_title ); ?>
                        </h2>
                        <div class="accent-line"></div>
                        <p class="banner-subtext fade-right">
                            <?php echo esc_html( $banner_desc ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
