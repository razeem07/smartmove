<?php /* Template Name: aboutpage
        Template Post Type: page,post */
 ?>

<?php get_header(); ?>
<!-- Banner -->
<?php get_template_part( 'template-parts/banner-common', null, array( 'heading_tag' => 'h1', 'class' => 'about-banner-compact--long' ) ); ?>

<!-- About Details Section -->
<section id="about-content" class="about-two--dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline">Our Expertise</span>
                    </div>
                    <h2 class="section-title__title fade-left" style="color: black;"><?php echo get_post_meta( get_the_ID(), 'about_us_title', true ); ?></h2>
                </div>
                <div class="about-copy text-dark-50 mb-30 fade-right">
                    <?php echo wpautop( esc_html( get_post_meta( get_the_ID(), 'about_us_content', true ) ) ); ?>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="row gutter-y-30">
                    <!-- Feature Card 1 -->
                    <div class="col-md-6">
                        <div class="about-two__feature-card">
                            <div class="about-two__card-divider"></div>
                            <h3 class="about-two__card-title text-white  fade-left"><?php echo get_post_meta( get_the_ID(), 'about_us_card_1_title', true ); ?></h3>
                            <p class="about-two__card-text text-white-50  fade-right">
							<?php echo get_post_meta( get_the_ID(), 'about_us_card_1_content', true ); ?>
							</p>
                        </div>
                    </div>
                    
                    <!-- Feature Card 2 -->
                    <div class="col-md-6">
                        <div class="about-two__feature-card">
                            <div class="about-two__card-divider"></div>
                            <h3 class="about-two__card-title text-white  fade-left"><?php echo get_post_meta( get_the_ID(), 'about_us_card_2_title', true ); ?></h3>
                            <p class="about-two__card-text text-white-50 fade-right">
							<?php echo get_post_meta( get_the_ID(), 'about_us_card_2_content', true ); ?>
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional Spacing -->
        <div class="mt-50"></div>
    </div>
</section>


<!-- About Services -->
<?php
// 1. Fetch the postmeta once to avoid multiple database calls
$services_data = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $services_data[ "service_{$i}" ] = array(
        'icon'    => get_post_meta( get_the_ID(), "services_service_{$i}_icon", true ),
        'title'   => get_post_meta( get_the_ID(), "services_service_{$i}_title", true ),
        'content' => get_post_meta( get_the_ID(), "services_service_{$i}_content", true ),
    );
}
$services_data['banner_image'] = wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'services_banner_image', true ), 'full' );

// 2. Extract the banner image
$banner_url = !empty($services_data['banner_image']) ? $services_data['banner_image'] : 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=1920&auto=format&fit=crop';

// 3. Define the styles as variables for a cleaner HTML structure
$section_style = "position: relative; min-height: 80vh; padding: 120px 0; background-image: url('" . $banner_url . "'); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover; display: flex; align-items: center; color: #fff; overflow: hidden;";
$overlay_style = "position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 1;";
$container_style = "position: relative; z-index: 2; width: 100%;";
$item_style    = "display: flex; align-items: flex-start; margin-bottom: 40px;";
$icon_box_style = "background-color: var(--smartmove-color-theme-blue2, #c5a059); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 20px;";
$icon_i_style  = "font-size: 35px; color: white;";
$h4_style      = "font-size: 24px; line-height: 1.2; font-weight: 700; margin-top: 0; margin-bottom: 10px; color: #ffffff; text-transform: capitalize;";
$p_style       = "color: rgba(255, 255, 255, 0.7); font-size: 16px; line-height: 1.6; margin: 0;";
?>

<section class="features-parallax" style="<?php echo $section_style; ?>">
    <!-- Background Overlay -->
    <div style="<?php echo $overlay_style; ?>"></div>

    <div class="container" style="<?php echo $container_style; ?>">
        <div class="row">
            <?php 
            /**
             * Loop through 4 cards. 
             * This assumes your ACF sub-fields are named 'service_1', 'service_2', etc.
             */
            for ($i = 1; $i <= 4; $i++): 
                $card_key = 'service_' . $i;
                $card = isset($services_data[$card_key]) ? $services_data[$card_key] : null;
                
                if ($card): ?>
                    <div class="col-md-6">
                        <div class="feature-item" style="<?php echo $item_style; ?>">
                            <!-- Icon Box -->
                            <div class="feature-icon-box" style="<?php echo $icon_box_style; ?>">
                                <i class="<?php echo esc_attr($card['icon']); ?>" style="<?php echo $icon_i_style; ?>"></i>
                            </div>
                            
                            <!-- Content Box -->
                            <div class="feature-content">
                                <h3 style="<?php echo $h4_style; ?>" class=" fade-left">
                                    <?php echo esc_html($card['title']); ?>
                                </h3>
                                <p style="<?php echo $p_style; ?>" class=" fade-right">
                                    <?php echo esc_html($card['content']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php 
                endif; 
            endfor; 
            ?>
        </div>
    </div>
</section>

<!-- Member -->
<?php
$args = array(
    'post_type'      => 'member',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'ASC', // First added comes first
);

$member_query = new WP_Query($args);

if ($member_query->have_posts()) : ?>
    <section class="leadership-section">
        <div class="container">
            <?php
            $leadership_title = get_post_meta( get_queried_object_id(), 'leadership_title', true );
            $leadership_intro = get_post_meta( get_queried_object_id(), 'leadership_intro', true );
            if ( '' === $leadership_title ) { $leadership_title = 'Our Leadership'; }
            ?>
            <div class="section-title text-center">
                <h2 class="section-title__title fade-left" style="color: black;"><?php echo esc_html( $leadership_title ); ?></h2>
            </div>
            <?php if ( $leadership_intro ) : ?>
            <div class="about-copy text-center mx-auto mb-5 fade-bottom" style="max-width: 760px;">
                <?php echo wpautop( esc_html( $leadership_intro ) ); ?>
            </div>
            <?php endif; ?>
            
            <div class="row justify-content-center">
                <?php while ($member_query->have_posts()) : $member_query->the_post(); 
                    // Fetch designation custom field
                    $designation = get_post_meta(get_the_ID(), 'designation', true); 
                ?>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="leadership-card">
                            <div class="member-image animated-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/300x350" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="member-info">
                                <h3 class="member-name  fade-right"><?php the_title(); ?></h3>
                                <?php if ($designation) : ?>
                                    <p class="member-designation fade-left"><?php echo esc_html($designation); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<!-- Partners -->
<?php
$args = array(
    'post_type'      => 'partner',
    'posts_per_page' => -1, // Pulls all partners
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$partner_query = new WP_Query($args);

if ($partner_query->have_posts()) : ?>
    <section class="prt-partners-section">
        <div class="prt-container">
            
            <?php
            $ventures_title = get_post_meta( get_queried_object_id(), 'ventures_title', true );
            $ventures_intro = get_post_meta( get_queried_object_id(), 'ventures_intro', true );
            if ( '' === $ventures_title ) { $ventures_title = 'Our Ventures'; }
            ?>
            <div class="prt-header">
                <h2 class="prt-title fade-left"><?php echo esc_html( $ventures_title ); ?></h2>
                <?php if ( $ventures_intro ) : ?>
                <div class="about-copy mx-auto fade-bottom" style="max-width: 760px; margin-top: 12px;">
                    <?php echo wpautop( esc_html( $ventures_intro ) ); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="prt-grid">
                <?php while ($partner_query->have_posts()) : $partner_query->the_post(); ?>
                    <div class="prt-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="prt-logo-wrapper animated-image">
                                <?php the_post_thumbnail('medium', ['class' => 'prt-logo-img', 'alt' => get_the_title()]); ?>
                            </div>
                        <?php else : ?>
                            <span class="prt-fallback-text fade-left"><?php the_title(); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

        </div>
    </section>
<?php endif; ?>

<!-- Features Section Start -->
<section class="features-one" style="background-color: white;">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline fade-right">Our Premium Benefits</span>
            </div>
            <?php
            $features_data = array( 'title' => get_post_meta( get_the_ID(), 'our_premium_features_title', true ) );
            for ( $i = 1; $i <= 3; $i++ ) {
                $features_data[ "card_{$i}" ] = array(
                    'icon'    => get_post_meta( get_the_ID(), "our_premium_features_card_{$i}_icon", true ),
                    'title'   => get_post_meta( get_the_ID(), "our_premium_features_card_{$i}_title", true ),
                    'content' => get_post_meta( get_the_ID(), "our_premium_features_card_{$i}_content", true ),
                );
            }
            if ( $features_data['title'] ) : ?>
                <h2 class="section-title__title fade-left" style="color: black;"><?php echo esc_html($features_data['title']); ?></h2>
            <?php endif; ?>
        </div>

        <div class="row gutter-y-30">
            <?php 
            // Loop through card numbers 1 to 3
            for ($i = 1; $i <= 3; $i++) : 
                $card_key = 'card_' . $i;
                $card = $features_data[$card_key];

                if ( $card ) : 
                    // Optional: Check if you want the middle card (index 2) to be 'active'
                    $active_class = ($i === 2) ? 'active' : '';
            ?>
                <div class="col-xl-4 col-lg-4">
                    <div class="features-card <?php echo $active_class; ?>">
                        <div class="features-card__icon">
                            <i class="<?php echo esc_attr($card['icon']); ?>"></i>
                        </div>
                        <h3 class="features-card__title fade-left">
                            <a href="#"><?php echo esc_html($card['title']); ?></a>
                        </h3>
                        <p class="features-card__text fade-right">
                            <?php echo esc_html($card['content']); ?>
                        </p>
                    </div>
                </div>
            <?php 
                endif;
            endfor; 
            ?>
        </div>
    </div>
</section>
<!-- Features Section End -->

<!-- Mission vission -->
<section class="mission-vision-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="mission-image-box animated-image">
                    <img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'mission_vision_banner_image', true ), 'full' ) ); ?>" alt="About Us" class="img-fluid rounded-30">
                    <div class="experience-badge">
                        <span class="gold-text">Est.</span>
                        <h3 class="white-text fade-left"><?php echo get_post_meta( get_the_ID(), 'mission_vision_start_year', true ); ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="section-title mb-4">
                    <span class="section-title__tagline fade-right">Our Purpose</span>
                    <h2 class="section-title__title fade-left"><?php echo get_post_meta( get_the_ID(), 'mission_vision_title', true ); ?></h2>
                    <?php $mission_intro = get_post_meta( get_the_ID(), 'mission_vision_intro', true ); ?>
                    <?php if ( $mission_intro ) : ?>
                    <div class="about-copy fade-right" style="color: rgba(255, 255, 255, 0.75); margin-top: 16px;"><?php echo wpautop( esc_html( $mission_intro ) ); ?></div>
                    <?php endif; ?>
                </div>

                <div class="rental-feature-item mission-card">
                    <div class="rf-icon">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <div class="rf-text">
                        <h3 class=" fade-left">Our Mission</h3>
                        <p class=" fade-right"><?php echo get_post_meta( get_the_ID(), 'mission_vision_mission', true ); ?></p>
                    </div>
                </div>

                <div class="rental-feature-item mission-card">
                    <div class="rf-icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="rf-text">
                        <h3 class=" fade-left">Our Vision</h3>
                        <p class=" fade-right"><?php echo get_post_meta( get_the_ID(), 'mission_vision_vision', true ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <?php get_footer(); ?>