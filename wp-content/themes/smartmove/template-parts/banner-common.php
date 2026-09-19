<?php
$banner_tag   = ( isset( $args['heading_tag'] ) && 'h1' === $args['heading_tag'] ) ? 'h1' : 'h2';
$banner_class = isset( $args['class'] ) ? sanitize_html_class( $args['class'] ) : '';
?>
<section class="about-banner-compact <?php echo esc_attr( $banner_class ); ?>">
    <!-- The background image container -->
    <div class="banner-image-wrapper" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'banner_image', true ), 'full' ) ); ?>');">
        <div class="banner-overlay-gradient"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-content-box">
                    <div class="section-title">
                        <span class="section-title__tagline"><?php echo esc_html( get_post_meta( get_the_ID(), 'banner_small_title', true ) ); ?></span>
                        <<?php echo $banner_tag; ?> class="compact-title fade-left">
                           <?php echo esc_html( get_post_meta( get_the_ID(), 'banner_title', true ) ); ?>
                        </<?php echo $banner_tag; ?>>
                        <div class="accent-line"></div>
                        <p class="banner-subtext fade-right">
                            <?php echo nl2br( esc_html( get_post_meta( get_the_ID(), 'banner_content', true ) ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
