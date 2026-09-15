<?php get_header(); ?>

<!-- Section 1: Banner -->
<?php get_template_part( 'template-parts/banner-archive' ); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
    // Fetch fleet fields
    $hourly = get_post_meta( get_the_ID(), 'hourly', true );
    $full_day = get_post_meta( get_the_ID(), 'full_day', true );
    $whatsapp_number = "911234567890"; // Update with your number
    $car_name = get_the_title();

    $seats = get_post_meta( get_the_ID(), 'number_of_seats', true );
    $doors = get_post_meta( get_the_ID(), 'number_of_doors', true );
    $color = get_post_meta( get_the_ID(), 'color', true );
?>

<main class="fsd-single-page">
    <div class="fsd-container">
        
        <div class="fsd-nav-row">
            <a href="<?php echo esc_url( home_url( '/our-fleets' ) ); ?>" class="fsd-back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg>
                Back to Fleet List
            </a>
        </div>

        <div class="fsd-split-layout">
            
            <div class="fsd-main-column">
                <div class="fsd-media-holder">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', ['class' => 'fsd-hero-img']); ?>
                    <?php endif; ?>
                </div>

                <div class="fsd-details-holder">
                    <h1 class="fsd-main-title fade-left"><?php the_title(); ?></h1>
                    
                    <div class="fsd-specs-bar">
                        <?php if($seats): ?>
                            <div class="fsd-spec-tag fade-right">
                                <strong><?php echo esc_html($seats); ?></strong> Seats
                            </div>
                        <?php endif; ?>
                        <?php if($doors): ?>
                            <div class="fsd-spec-tag fade-left">
                                <strong><?php echo esc_html($doors); ?></strong> Doors
                            </div>
                        <?php endif; ?>
                        <?php if($color): ?>
                            <div class="fsd-spec-tag fade-right">
                                <strong>Color:</strong> <?php echo esc_html($color); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="fsd-content-rich-text fade-left">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <div class="fsd-sidebar-column">
                <div class="fsd-sticky-widget">
                    <div class="fsd-booking-card">
                        <h3 class="fsd-widget-heading fade-left">Rental Rates</h3>
                        
                        <div class="fsd-pricing-table">
                            <?php if($hourly): ?>
                                <div class="fsd-price-row">
                                    <span class="fsd-label fade-right">Half Day Rate</span>
                                    <span class="fsd-amount fade-left">₹<?php echo esc_html($hourly); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if($full_day): ?>
                                <div class="fsd-price-row highlight">
                                    <span class="fsd-label fade-left">Full Day Rate (24h)</span>
                                    <span class="fsd-amount fade-right">₹<?php echo esc_html($full_day); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

						<a href="https://wa.me/<?php echo preg_replace('/\D/', '', get_theme_mod('footer_phone')); ?>?text=I+would+like+to+book+the+<?php echo urlencode($car_name); ?>" 
						   target="_blank" 
						   class="fsd-whatsapp-btn">
							<i class="bi bi-whatsapp"></i>
							Book via WhatsApp
						</a>



                        <div class="fsd-perks-list">
                            <div class="fsd-perk-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#ab8954" viewBox="0 0 16 16"><path d="M12.736 14 Mart 7.664a.5.5 0 0 0-.707 0L1.146 11.146a.5.5 0 0 0 .708.708L5 8.207l7.146 7.147a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708z"/><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                                <span>Instant Confirmation</span>
                            </div>
                            <div class="fsd-perk-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#ab8954" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                                <span>Professional Chauffeurs</span>
                            </div>
                            <div class="fsd-perk-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#ab8954" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                                <span>24/7 Concierge Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>