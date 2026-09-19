<?php /* Template Name: homepage Template*/ ?>

<?php get_header(); ?>
<style>
/* Fix for Swiper Navigation Icons */
.swiper-button-next:after, .swiper-button-prev:after {
    display: none; /* Hide default Swiper arrows */
}
.swiper-button-next, .swiper-button-prev {
    color: #fff; /* Match your theme colors */
}

/* Prevent horizontal page stretch globally */
/* html, body {
    max-width: 100% !important;
    overflow-x: hidden !important;
}	 */
	
</style>
<?php
// Fetch the hero banner postmeta once to optimize performance
$hero_banner = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $hero_banner[ "banner_{$i}" ] = array(
        'image'       => wp_get_attachment_image_url( get_post_meta( get_the_ID(), "hero_banner_banner_{$i}_image", true ), 'full' ),
        'title'       => get_post_meta( get_the_ID(), "hero_banner_banner_{$i}_title", true ),
        'description' => get_post_meta( get_the_ID(), "hero_banner_banner_{$i}_description", true ),
    );
}
?>

<section class="main-slider-two">
    <div class="main-slider-two__wrap main-container">
        <div class="main-slider-two__carousel">
            
            <!-- Slide 1 -->
            <div class="slide-item is-active">
                <div class="item" style="background-image: url('<?php echo esc_url($hero_banner['banner_1']['image']); ?>');">
                    <div class="container">
                        <div class="main-slider-two__content">
                            <h1 class="main-slider-two__title fade-left"><?php echo esc_html($hero_banner['banner_1']['title']); ?></h1>
                            <p class="main-slider-two__text fade-right"><?php echo esc_html($hero_banner['banner_1']['description']); ?></p>
                            <div class="main-slider-two__btn">
                                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="thm-btn">Get Started<span class="icon-arrow-up-right"></span></a>
                                <a href="<?php echo esc_url( home_url( '/our-fleets/' ) ); ?>" class="thm-btn thm-btn--outline">Explore Our Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide-item">
                <div class="item" style="background-image: url('<?php echo esc_url($hero_banner['banner_2']['image']); ?>');">
                    <div class="container">
                        <div class="main-slider-two__content">
                            <h2 class="main-slider-two__title fade-left"><?php echo esc_html($hero_banner['banner_2']['title']); ?></h2>
                            <p class="main-slider-two__text fade-right"><?php echo esc_html($hero_banner['banner_2']['description']); ?></p>
                            <div class="main-slider-two__btn">
                                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="thm-btn">Get Started<span class="icon-arrow-up-right"></span></a>
                                <a href="<?php echo esc_url( home_url( '/our-fleets/' ) ); ?>" class="thm-btn thm-btn--outline">Explore Our Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide-item">
                <div class="item" style="background-image: url('<?php echo esc_url($hero_banner['banner_3']['image']); ?>');">
                    <div class="container">
                        <div class="main-slider-two__content">
                            <h2 class="main-slider-two__title fade-left"><?php echo esc_html($hero_banner['banner_3']['title']); ?></h2>
                            <p class="main-slider-two__text fade-right"><?php echo esc_html($hero_banner['banner_3']['description']); ?></p>
                            <div class="main-slider-two__btn">
                                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="thm-btn">Get Started<span class="icon-arrow-up-right"></span></a>
                                <a href="<?php echo esc_url( home_url( '/our-fleets/' ) ); ?>" class="thm-btn thm-btn--outline">Explore Our Fleet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Positioned Control Layer -->
            <div class="main-slider-two__nav">
                <div class="slider-prev"><span class="bi bi-arrow-left"></span></div>
                <div class="slider-next"><span class="bi bi-arrow-right"></span></div>
            </div>

        </div>
    </div>
</section>

<style>
/* -------------------------------------------------------------
   1. Base Layout & Container Controls
------------------------------------------------------------- */
.main-slider-two,
.main-slider-two__wrap,
.main-slider-two__carousel {
    position: relative !important;
    width: 100% !important;
    height: 100vh !important;
    min-height: 550px !important;
    overflow: hidden !important;
    margin: 0 !important;
    padding: 0 !important;
}

.main-slider-two__carousel .slide-item {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    opacity: 0;
    visibility: hidden;
    z-index: 1;
    transition: opacity 0.6s ease, visibility 0.6s ease;
}

.main-slider-two__carousel .slide-item.is-active {
    opacity: 1 !important;
    visibility: visible !important;
    z-index: 2 !important;
}

.main-slider-two__carousel .item {
    width: 100% !important;
    height: 100% !important;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    display: flex !important;
    align-items: center !important;
    justify-content: flex-start !important;
}

.main-slider-two .container {
    width: 100% !important;
    max-width: 1200px !important;
/* 	max-width: 100% !important; */
    margin-left: auto !important;
    margin-right: auto !important;
    padding-left: 24px !important;
    padding-right: 24px !important;
    box-sizing: border-box !important;
}

	.main-container {
    width: 100% !important;
/*     max-width: 1200px !important; */
	max-width: 100% !important;
    margin-left: auto !important;
    margin-right: auto !important;
/*     padding-left: 24px !important; */
/*     padding-right: 24px !important; */
    box-sizing: border-box !important;
}	
	
	
/* -------------------------------------------------------------
   2. Strict Left-Alignment Column (Title, Text & Button)
------------------------------------------------------------- */
.main-slider-two__content {
    display: flex !important;
    flex-direction: column !important;
    align-items: flex-start !important;
    justify-content: center !important;
    text-align: left !important;
    width: 100% !important;
    max-width: 720px !important;
    margin: 0 !important;
    padding: 0 !important;
    float: none !important;
}

.main-slider-two__title {
    display: block !important;
    text-align: left !important;
    margin: 0 0 18px 0 !important;
    padding: 0 !important;
    width: 100% !important;
    max-width: 100% !important;
    transform: none !important;
    font-size: clamp(2.1rem, 4.5vw, 3.8rem) !important;
    line-height: 1.15 !important;
    color: #ffffff !important;
}

.main-slider-two__text {
    display: block !important;
    text-align: left !important;
    margin: 0 0 28px 0 !important;
    padding: 0 !important;
    width: 100% !important;
    max-width: 580px !important;
    transform: none !important;
    font-size: clamp(0.95rem, 1.8vw, 1.15rem) !important;
    line-height: 1.6 !important;
    color: #ffffff !important;
}

.main-slider-two__btn {
    display: flex !important;
    justify-content: flex-start !important;
    margin: 0 !important;
    padding: 0 !important;
    width: auto !important;
    align-self: flex-start !important;
}

.main-slider-two__btn .thm-btn {
    margin-left: 0 !important;
    margin-right: auto !important;
}

.main-slider-two__btn {
    gap: 14px !important;
    flex-wrap: wrap !important;
}

.main-slider-two__btn .thm-btn.thm-btn--outline {
    background: transparent !important;
    border: 2px solid #ffffff !important;
    color: #ffffff !important;
}

.home-copy p {
    margin: 0 0 16px;
}

.home-copy p:last-child {
    margin-bottom: 0;
}

.main-slider-two__btn .thm-btn.thm-btn--outline:hover {
    color: #171717 !important;
}

/* -------------------------------------------------------------
   3. Desktop Navigation Controls
------------------------------------------------------------- */
.main-slider-two__nav {
    position: absolute !important;
    top: 50% !important;
    left: 0 !important;
    right: 0 !important;
    transform: translateY(-50%) !important;
    display: flex !important;
    justify-content: space-between !important;
    padding: 0 30px !important;
    z-index: 10 !important;
    pointer-events: none !important;
}

.slider-prev,
.slider-next {
    pointer-events: auto !important;
    width: 50px !important;
    height: 50px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.2) !important;
    backdrop-filter: blur(8px) !important;
    color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    font-size: 18px !important;
    transition: all 0.3s ease !important;
}

.slider-prev:hover,
.slider-next:hover {
    background: rgba(255, 255, 255, 0.4) !important;
}

/* -------------------------------------------------------------
   4. Mobile Adjustments (< 768px)
------------------------------------------------------------- */
@media screen and (max-width: 767px) {
    .main-slider-two,
    .main-slider-two__wrap,
    .main-slider-two__carousel {
        height: 100dvh !important;
        min-height: 480px !important;
    }

    .main-slider-two .container {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .main-slider-two__content {
        padding-bottom: 70px !important;
        max-width: 100% !important;
    }

    .main-slider-two__title {
        font-size: clamp(1.6rem, 7vw, 2.2rem) !important;
        margin-bottom: 12px !important;
    }

    .main-slider-two__text {
        font-size: 0.95rem !important;
        margin-bottom: 20px !important;
    }

    /* CENTER SLIDER BUTTONS ON MOBILE */
    .main-slider-two__nav {
        top: auto !important;
        bottom: 20px !important;
        left: 50% !important;
        right: auto !important;
        transform: translateX(-50%) !important;
        padding: 0 !important;
        gap: 16px !important;
        justify-content: center !important;
        width: auto !important;
    }

    .slider-prev,
    .slider-next {
        width: 44px !important;
        height: 44px !important;
    }
}
	
/* -------------------------------------------------------------
   Overlay & Z-Index Layering Fix
------------------------------------------------------------- */
.main-slider-two__carousel .item {
    position: relative !important; /* Context for absolute pseudo-element overlay */
}

/* Dark Gradient Overlay for Readability */
.main-slider-two__carousel .item::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    /* Gradient: Darker on the left (where text lives), lighter on the right */
    background: linear-gradient(
        90deg, 
        rgba(0, 0, 0, 0.75) 0%, 
        rgba(0, 0, 0, 0.45) 50%, 
        rgba(0, 0, 0, 0.2) 100%
    ) !important;
    z-index: 1 !important;
}

/* Force container & text content to render on top of the overlay */
.main-slider-two .container {
    position: relative !important;
    z-index: 2 !important;
}

/* Subtle text shadow for high-contrast visibility */
.main-slider-two__title,
.main-slider-two__text {
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6) !important;
}
</style>

<!-- ABOUT US -->
<section class="about-two about-two--dark">
    <div class="container">
        <div class="about-two__top">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-left">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline">About Us</span>
                        </div>
                        <h2 class="section-title__title text-dark fade-left">
                            <?php echo get_post_meta( get_the_ID(), 'aboutus_section_main_title', true ); ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-two__content-wrapper">
            <div class="row align-items-center">
                <!-- Image Side -->
                <div class="col-xl-5 col-lg-6">
                    <div class="about-two__image-box animated-image">
                        <img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'aboutus_section_image', true ), 'full' ) ); ?>" alt="About Us" class="img-fluid border-radius-20">
                    </div>
                </div>

                <!-- Text Side -->
                <div class="col-xl-7 col-lg-6">
                    <div class="about-two__text-box">
                        <?php $about_sub_title = get_post_meta( get_the_ID(), 'aboutus_section_title', true ); ?>
                        <?php if ( $about_sub_title ) : ?>
                        <h3 class="about-two__content-title text-dark fade-left"><?php echo esc_html( $about_sub_title ); ?></h3>
                        <?php endif; ?>
                        <div class="home-copy about-two__content-text text-dark-50 fade-right"><?php echo wpautop( esc_html( get_post_meta( get_the_ID(), 'aboutus_section_content', true ) ) ); ?></div>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="about-two__cards-grid mt-50">
                <?php $about_cards_heading = get_post_meta( get_the_ID(), 'aboutus_section_cards_heading', true ); ?>
                <?php if ( $about_cards_heading ) : ?>
                <h2 class="section-title__title text-dark fade-left mb-4"><?php echo esc_html( $about_cards_heading ); ?></h2>
                <?php endif; ?>
                <div class="row">
                    <?php
                    $cards = array();
                    for ( $i = 1; $i <= 4; $i++ ) {
                        $cards[ "card_{$i}" ] = array(
                            'title'   => get_post_meta( get_the_ID(), "aboutus_section_cards_card_{$i}_title", true ),
                            'content' => get_post_meta( get_the_ID(), "aboutus_section_cards_card_{$i}_content", true ),
                        );
                    }
                    if($cards):
                        foreach($cards as $card):
                    ?>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="about-two__feature-card">
                            <div class="about-two__card-inner">
                                <h3 class="about-two__card-title text-white fade-left"><?php echo $card['title']; ?></h3>
                                <div class="about-two__card-divider"></div>
                                <p class="about-two__card-text text-white-50 fade-right"><?php echo $card['content']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Counter -->
<!-- removed -->

<!-- Fleets -->
<section class="erc-fleet-section">
    <div class="erc-container">
        
        <div class="erc-header">
            <h2 class="section-title__title text-dark fade-left">Exotic Car Rental in Dubai</h2>
            <p class="erc-subtitle fade-right">Make every journey memorable with our collection of luxury and exotic rental cars in Dubai. Whether you want a stylish sports car for a special occasion or a premium vehicle for your Dubai experience, explore our fleet and find the car that matches your style.</p>
        </div>

        <div class="erc-grid">
            <?php
            $args = array(
                'post_type'      => 'fleet',
                'posts_per_page' => 4,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); 
                ?>
                    <div class="erc-card">
						<div class="erc-image-wrapper animated-image">
							<a href="<?php the_permalink(); ?>" class="erc-card-link">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('large', array('class' => 'erc-car-img')); ?>
								<?php else : ?>
									<img src="path-to-fallback-car.jpg" alt="<?php the_title(); ?>" class="erc-car-img ">
								<?php endif; ?>

								<div class="erc-hover-overlay fade-left">
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
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

        <div class="erc-footer">
            <a href="<?php echo esc_url( home_url( '/our-fleets' ) ); ?>" class="erc-view-all">
                View All Luxury &amp; Exotic Cars 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
            </a>
        </div>

    </div>
</section>


<!--Services Section exclusive_rental_section -->
<section class="rental-exclusive-section">
    <!-- The Sticky "Locking" Background -->
    <div class="rental-parallax-bg" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'exclusive_rental_section_banner_image', true ), 'full' ) ); ?>');"></div>
    
    <div class="container">
        <div class="row">
            
            <!-- Left Side: Scrolling Service Features -->
<div class="col-lg-7 order-2 order-lg-1">
    <div class="rental-feature-list">
        <?php
        $exclusive_home_id = get_the_ID();
        // Loop from 1 to 4 to match card_1, card_2, etc.
        for ($i = 1; $i <= 4; $i++) :
            $card = array(
                'icon'    => get_post_meta( $exclusive_home_id, "exclusive_rental_section_cards_card_{$i}_icon", true ),
                'title'   => get_post_meta( $exclusive_home_id, "exclusive_rental_section_cards_card_{$i}_title", true ),
                'content' => get_post_meta( $exclusive_home_id, "exclusive_rental_section_cards_card_{$i}_content", true ),
            );

            // Only render if the card actually has data
            if ( !empty($card['title']) ) : ?>
                    <div class="rental-feature-item">
                        <div class="rf-icon">
                            <span class="<?php echo esc_attr($card['icon']); ?>"></span>
                        </div>
                        <div class="rf-text">
                            <h4 class="fade-left"><?php echo esc_html($card['title']); ?></h4>
                            <p class="fade-right"><?php echo esc_html($card['content']); ?></p>
                        </div>
                    </div>
                <?php
                endif;
            endfor;
        ?>
    </div>
</div>

            <!-- Right Side: Sticky Intro -->
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="rental-sticky-info text-lg-right">
                    <div class="section-title">
                        <div class="section-title__tagline-box text-start">
                            <span class="section-title__tagline fade-left">Exclusive Rental</span>
                        </div>
                        <h2 class="section-title__title text-white fade-right"><?php echo get_post_meta( get_the_ID(), 'exclusive_rental_section_main_title', true ); ?></h2>
                        <div class="home-copy text-white-50 mt-4 fade-left"><?php echo wpautop( esc_html( get_post_meta( get_the_ID(), 'exclusive_rental_section_content', true ) ) ); ?></div>
                        <div class="mt-5 main-slider-two__btn">
                            <a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'exclusive_rental_section_book_link', true ) ); ?>" class="thm-btn">Book Your Experience</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- SERVICES Carousel -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.src-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        
        // Navigation arrows configuration
        navigation: {
            nextEl: '.src-swiper-next',
            prevEl: '.src-swiper-prev',
        },
        
        // Pagination dots configuration
        pagination: {
            el: '.src-swiper-pagination',
            clickable: true,
        },
        
        // Responsive breakpoints configuration
        breakpoints: {
            // When window width is >= 640px (Tablets)
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // When window width is >= 1024px (Desktop)
            1024: {
                slidesPerView: 3,
                spaceBetween: 25
            }
        }
    });
});
</script>
<?php
$args = array(
    'post_type'      => 'service',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'posts_per_page' => -1, 
);

$services_query = new WP_Query($args);

if ($services_query->have_posts()) : ?>
    <section class="src-carousel-section">
        <div class="src-container">
			<div class="erc-header">
            	<h2 class="section-title__title text-dark fade-left">Our Car Rental Services</h2>
				<p class="erc-subtitle fade-right">Whether you need a vehicle for a few days, several weeks, or an extended period, Smart Move Dubai offers flexible car rental services designed for different travel and business requirements.</p>
        	</div>
            <div class="swiper src-swiper">
                <div class="swiper-wrapper">
                    <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="src-card">
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="src-card-image animated-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="src-card-body">
                                    <h3 class="src-card-title fade-right">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <div class="src-card-excerpt">
                                       <p class="fade-bottom">
										    <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
										</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                
				<div class="swiper-button-next src-swiper-next">
					<i class="bi bi-arrow-right-circle-fill"></i>
				</div>
				<div class="swiper-button-prev src-swiper-prev">
					<i class="bi bi-arrow-left-circle-fill"></i>
				</div>

                
                <div class="swiper-pagination src-swiper-pagination"></div>
            </div>
        	<div class="erc-footer">
				<a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="erc-view-all">
					View all 
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>
				</a>
			</div>
        </div>
    </section>
<?php endif; ?>


<!-- BLOGS -->
<section class="blog-one blog-one--dark">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline fade-bottom">Latest News</span>
            </div>
            <h2 class="section-title__title text-dark fade-left">Dubai Car Rental Insights &amp; Travel Guide</h2>
            <p class="fade-bottom" style="max-width: 760px; margin: 15px auto 0;">Explore useful car rental tips, Dubai travel guides, driving information, vehicle insights, and practical advice to help you make the most of your time in the UAE.</p>
        </div>
        
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog-one__single">
                        <div class="blog-one__img-wrapper">
                            <div class="blog-one__img animated-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/600x600/eee/999?text=SmartMove" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <!-- Date removed to match Screenshot 2026-05-02 122649.jpg -->
                        </div>
                        
                        <div class="blog-one__content">
                            <!-- Meta list removed for clean aesthetic -->
                            
                            <h3 class="blog-one__title fade-left">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <!-- Added excerpt to match the screenshot text -->
                            <div class="blog-one__text">
                                <p class="fade-bottom"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                            </div>

                            <div class="blog-one__btn">
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>


<!-- User Reviews / Testimonials -->
<?php
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => 10, // Fetch a good number for the loop
);
$testimonials_query = new WP_Query($args);
?>

<section class="testimonial-live-section">
    <!-- Sticky Banner Background -->
    <div class="testimonial-banner-bg" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'testimonials_banner_image', true ), 'full' ) ); ?>');"></div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-title">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline fade-bottom">What Our Customers Say</span>
                    </div>
                    <h2 class="section-title__title fade-left" style="color: white;">Customer Reviews</h2>
                    <p class="mt-3 fade-right" style="color: rgba(255,255,255,0.7);">Our customers choose Smart Move Dubai for convenient bookings, quality vehicles, flexible rental options, and professional service.</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="live-comment-wrapper">
                    <div class="live-comment-track">
                        <?php if ($testimonials_query->have_posts()) : ?>
                            <?php 
                            // We loop twice to create a seamless infinite scroll effect
                            for ($i = 0; $i < 2; $i++) : 
                                while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); 
                            ?>
                                <div class="live-comment-card">
                                    <div class="live-comment-header">
                                        <h4 class="live-comment-name fade-left"><?php the_title(); ?></h4>
                                    </div>
                                    <div class="live-comment-text fade-right">
                                        <?php echo get_the_content(); ?>
                                    </div>
                                </div>
                            <?php 
                                endwhile; 
                                $testimonials_query->rewind_posts(); 
                            endfor; 
                            ?>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<?php 
$args = array(
    'post_type'      => 'faq', 
    'posts_per_page' => -1,
    'orderby'        => 'menu_order', 
    'order'          => 'ASC'
);
$faq_query = new WP_Query($args);
$count = 0;
?>

<section class="faq-2col-section">
    <div class="faq-2col-container">
        
        <div class="faq-2col-header">
            <h2 class="faq-2col-main-title fade-left">Frequently Asked <span class="faq-2col-title-bold">Questions</span></h2>
        </div>

        <div class="faq-2col-grid fade-bottom">
            <?php if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post(); $count++; ?>
                
                <div class="faq-2col-item">
                    
                    <div class="faq-2col-trigger faq-item-q" onclick="toggleFaqItem(this)">
                        <p class="faq-2col-question"><?php the_title(); ?></p>
                        <div class="faq-2col-indicator">
                            <span class="faq-2col-icon-line"></span>
                            <span class="faq-2col-icon-line"></span>
                        </div>
                    </div>

                    <div class="faq-2col-collapse">
                        <div class="faq-2col-body">
                            <?php the_content(); ?>
                        </div>
                    </div>

                </div>

            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

    </div>
</section>

<script>
function toggleFaqItem(element) {
    const currentItem = element.parentElement;
    const isExpanded = currentItem.classList.contains('is-expanded');
    
    // Find all other open items in this section and close them
    document.querySelectorAll('.faq-2col-item').forEach(item => {
        item.classList.remove('is-expanded');
    });
    
    // If clicked item wasn't open, open it now
    if (!isExpanded) {
        currentItem.classList.add('is-expanded');
    }
}
</script>

<?php
$args = array(
    'post_type'      => 'brand',
    'posts_per_page' => -1, 
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$partner_query = new WP_Query($args);

if ($partner_query->have_posts()) : ?>
    <section class="pmq-partners-section">
        <div class="pmq-container">
            
            <!-- Section Header -->
            <div class="pmq-header">
                <h2 class="pmq-title">Premium &amp; Luxury Car Brands Available in Dubai</h2>
            </div>

            <!-- Marquee Track Wrapper -->
            <div class="pmq-marquee-wrapper">
                <div class="pmq-marquee-track">
                    
                    <?php 
                    $logos = array();
                    while ($partner_query->have_posts()) : $partner_query->the_post(); 
                        
                        $logo_url = '';
                        
                        // 1. Try fetching a raw 'brand' postmeta value (never actually populated on brand posts)
                        $brand_logo = get_post_meta( get_the_ID(), 'brand', true );
                        if ($brand_logo) {
                            $logo_url = is_array($brand_logo) ? $brand_logo['url'] : $brand_logo;
                        }
                        
                        // 2. FALLBACK: If ACF is empty, grab the native Featured Image
                        if (empty($logo_url) && has_post_thumbnail()) {
                            $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        }
                        
                        // Only add to array if we found a valid image source
                        if (!empty($logo_url)) {
                            $logos[] = array(
                                'url'   => $logo_url, 
                                'title' => get_the_title()
                            );
                        }
                    endwhile; 
                    wp_reset_postdata(); 
                    
                    // If we have items, display them. 
                    // We run it up to 4 times if the list is short to prevent blank gaps in the marquee
                    if (!empty($logos)) {
                        $repeat_count = (count($logos) < 5) ? 4 : 2;
                        
                        for ($i = 0; $i < $repeat_count; $i++) :
                            foreach ($logos as $logo) : ?>
                                <div class="pmq-item">
                                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['title']); ?>" class="pmq-logo-img">
                                </div>
                            <?php endforeach;
                        endfor;
                    } else {
                        // Debug helper message visible only to admins if no images were found anywhere
                        if (current_user_can('manage_options')) {
                            echo '<p style="color:red; padding: 20px;">Admin Notice: No images found. Ensure your Brand posts have a Featured Image assigned.</p>';
                        }
                    }
                    ?>

                </div>
            </div>

        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>