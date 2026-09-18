<?php get_header(); ?>

<!-- Main common banner -->
<?php get_template_part( 'template-parts/banner-archive' ); ?>

<!-- Fleets Section -->
<section class="erc-fleet-section">
    <div class="erc-container">
        
        <div class="erc-header">
            <!-- Dynamically displays the category name (e.g., "Sports Car") -->
            <h2 class="section-title__title text-dark fade-left"><?php single_cat_title(); ?></h2>
            <?php 
            $category_description = category_description();
            if ( ! empty( $category_description ) ) {
                echo '<p class="erc-subtitle fade-right">' . $category_description . '</p>';
            } else {
                echo '<p class="erc-subtitle fade-right">Discover our ' . single_cat_title('', false) . ' collection</p>';
            }
            ?>
        </div>

        <div class="erc-grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="erc-card">
                    <div class="erc-image-wrapper">
                        <a href="<?php the_permalink(); ?>" class="erc-card-link animated-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'erc-car-img')); ?>
                            <?php else : ?>
                                <img src="path-to-fallback-car.jpg" alt="<?php the_title(); ?>" class="erc-car-img">
                            <?php endif; ?>

                            <div class="erc-hover-overlay">
                                <span class="erc-hover-text">View Details</span>
                            </div>
                        </a>
                    </div>

                    <div class="erc-content">
                        <div class="erc-meta-row">
                            <span class="erc-badge erc-badge-luxury fade-right">Luxury</span> 
                            <span class="erc-specs  fade-left">
                                <?php echo get_post_meta( get_the_ID(), 'number_of_seats', true ); ?> Seats |
                                <?php echo get_post_meta( get_the_ID(), 'number_of_doors', true ); ?> Doors |
                                <?php echo get_post_meta( get_the_ID(), 'color', true ); ?>
                            </span>
                        </div>

                        <h3 class="erc-car-title fade-right"><?php the_title(); ?></h3>
                        
                        <p class="erc-price-text  fade-left">Contact us for best price</p>

                        <div class="erc-actions">
                            <a href="tel:<?php echo esc_attr( preg_replace('/\D/', '', get_theme_mod('footer_phone')) ); ?>" class="erc-btn erc-btn-call">
                                <i class="bi bi-telephone-fill"></i>
                                Call
                            </a>
                            <a href="https://wa.me/<?php echo preg_replace('/\D/', '', get_theme_mod('footer_whatsapp')); ?>?text=I+would+like+to+book+the+<?php the_title(); ?>" target="_blank" class="erc-btn erc-btn-whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

            <?php endwhile; else : ?>
                <p>Sorry, no vehicles found matching this category.</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>