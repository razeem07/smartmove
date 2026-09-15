<?php /* Template Name: Our Fleets Page
        Template Post Type: page,post */
 ?>

 <?php get_header(); ?>

<?php get_template_part( 'template-parts/banner-common' ); ?>

<!-- Fleets -->
<section class="erc-fleet-section">
    <div class="erc-container">
        
        <div class="erc-header">
            <h2 class="section-title__title text-dark fade-left">Car Rental</h2>
            <p class="erc-subtitle fade-right">Discover Exotic Car Rental cars</p>
        </div>

        <div class="erc-grid">
            <?php
            $args = array(
                'post_type'      => 'fleet',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                ?>
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
                                <span class="erc-badge erc-badge-luxury">Luxury</span> <span class="erc-specs"><?php echo get_post_meta( get_the_ID(), 'number_of_seats', true ); ?> Seats | <?php echo get_post_meta( get_the_ID(), 'number_of_doors', true ); ?> Doors | <?php echo get_post_meta( get_the_ID(), 'color', true ); ?></span>
                            </div>

                            <h3 class="erc-car-title fade-left"><?php the_title(); ?></h3>
                            
                            <p class="erc-price-text fade-right">Contact us for best price</p>

                            <div class="erc-actions">
								<a href="tel:<?php echo get_theme_mod('footer_phone'); ?>" class="erc-btn erc-btn-call">
									<i class="bi bi-telephone-fill"></i>
									Call
								</a>
								<a href="https://wa.me/<?php echo preg_replace('/\D/', '', get_theme_mod('footer_phone')); ?>?text=I+would+like+to+book+the+<?php the_title(); ?>"  target="_blank" class="erc-btn erc-btn-whatsapp">
									<i class="bi bi-whatsapp"></i>
									WhatsApp
								</a>
							</div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

    </div>
</section>




 <?php get_footer(); ?>