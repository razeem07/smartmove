<?php
/**
 * Single template for the 'service' post type.
 */
get_header();

$phone_number = get_theme_mod( 'footer_phone' );
$wa_number    = preg_replace( '/\D+/', '', get_theme_mod( 'footer_whatsapp' ) );
?>

<!-- Service Hero -->
<section class="about-banner-compact">
    <div class="banner-image-wrapper" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
        <div class="banner-overlay-gradient"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-content-box">
                    <div class="section-title">
                        <span class="section-title__tagline">Our Services</span>
                        <h2 class="compact-title fade-left"><?php the_title(); ?></h2>
                        <div class="accent-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="single-service-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-service-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-service-cta">
                    <h4 class="single-service-cta__title">Interested in this service?</h4>
                    <p class="single-service-cta__text">Get in touch and we'll take care of the rest.</p>
                    <div class="erc-actions">
                        <a href="tel:<?php echo esc_attr( $wa_number ); ?>" class="erc-btn erc-btn-call">
                            <i class="bi bi-telephone-fill"></i>
                            Call
                        </a>
                        <a href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>?text=I+would+like+to+enquire+about+<?php echo rawurlencode( get_the_title() ); ?>" target="_blank" class="erc-btn erc-btn-whatsapp">
                            <i class="bi bi-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                    <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="single-service-back-link">
                        <i class="bi bi-arrow-left"></i> Back to all services
                    </a>
                </div>
            </div>
        </div>

        <?php
        $smartmove_service_faqs = get_post_meta( get_the_ID(), 'service_faqs', true );
        if ( ! empty( $smartmove_service_faqs ) ) :
        ?>
        <div class="faq-2col-header">
            <h2 class="faq-2col-main-title fade-left">Frequently Asked <span class="faq-2col-title-bold">Questions</span></h2>
        </div>
        <div class="faq-2col-grid fade-bottom mb-5">
            <?php foreach ( $smartmove_service_faqs as $smartmove_faq ) : ?>
                <div class="faq-2col-item">
                    <div class="faq-2col-trigger faq-item-q" onclick="toggleFaqItem(this)">
                        <p class="faq-2col-question"><?php echo esc_html( $smartmove_faq['question'] ); ?></p>
                        <div class="faq-2col-indicator">
                            <span class="faq-2col-icon-line"></span>
                            <span class="faq-2col-icon-line"></span>
                        </div>
                    </div>
                    <div class="faq-2col-collapse">
                        <div class="faq-2col-body">
                            <p><?php echo nl2br( esc_html( $smartmove_faq['answer'] ) ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <script>
        function toggleFaqItem(element) {
            const currentItem = element.parentElement;
            const isExpanded = currentItem.classList.contains('is-expanded');
            document.querySelectorAll('.faq-2col-item').forEach(item => {
                item.classList.remove('is-expanded');
            });
            if (!isExpanded) {
                currentItem.classList.add('is-expanded');
            }
        }
        </script>
        <?php endif; ?>

        <?php
        $related_services = new WP_Query( array(
            'post_type'      => 'service',
            'posts_per_page' => 3,
            'post__not_in'   => array( get_the_ID() ),
            'orderby'        => 'rand',
        ) );

        if ( $related_services->have_posts() ) : ?>
            <div class="single-service-related">
                <h3 class="single-service-related__title fade-left">Other Services</h3>
                <div class="row g-4">
                    <?php while ( $related_services->have_posts() ) : $related_services->the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="service-card__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'large' ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="service-card__body">
                                    <h3 class="service-card__title fade-left">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="service-card__excerpt">
                                        <p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
