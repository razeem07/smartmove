<section class="about-banner-compact">
    <!-- The background image container -->
    <div class="banner-image-wrapper" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'banner_image', true ), 'full' ) ); ?>');">
        <div class="banner-overlay-gradient"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-content-box">
                    <div class="section-title">
                        <span class="section-title__tagline"><?php echo get_post_meta( get_the_ID(), 'banner_small_title', true ); ?></span>
                        <h2 class="compact-title fade-left">
                           <?php echo get_post_meta( get_the_ID(), 'banner_title', true ); ?>
                        </h2>
                        <div class="accent-line"></div>
                        <p class="banner-subtext fade-right">
                            <?php echo get_post_meta( get_the_ID(), 'banner_content', true ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
