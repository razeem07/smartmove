<?php

 require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

 require get_template_directory() . '/inc/customizer.php';

 require get_template_directory() . '/inc/meta-boxes/meta-boxes-core.php';

/**
 * Navbar fleet-search widget: an icon that expands into a search input.
 * Submitting redirects to the Our Fleets page with a ?fleet_search= query
 * arg, which ourfleetspage.php reads on load to pre-run the same live
 * filter used on that page. Shared markup for the main header, sticky
 * header, and mobile nav so all three stay in sync.
 */
function smartmove_render_navbar_search( $variant = 'default' ) {
    $fleets_url = home_url( '/our-fleets/' );
    $wrapper_class = 'main-menu-two__search main-menu-two__search--' . esc_attr( $variant );
    ?>
    <div class="<?php echo $wrapper_class; ?>">
        <button type="button" class="main-menu-two__search-toggle" aria-label="Search fleets">
            <i class="fa fa-search"></i>
        </button>
        <form class="main-menu-two__search-form" action="<?php echo esc_url( $fleets_url ); ?>" method="get">
            <input type="text" name="fleet_search" class="main-menu-two__search-input" placeholder="Search fleets by name or brand...">
        </form>
    </div>
    <?php
}


/**
 * Optional site-wide noindex, nofollow, controlled by the
 * Customizer > Search Engine Visibility checkbox (off by default).
 */
function smartmove_hide_from_search_engines() {
    return (bool) get_theme_mod( 'hide_from_search_engines', false );
}

function smartmove_wp_robots_noindex( $robots ) {
    if ( smartmove_hide_from_search_engines() ) {
        $robots['noindex']  = true;
        $robots['nofollow'] = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'smartmove_wp_robots_noindex', 99 );

function smartmove_yoast_robots_noindex( $robots ) {
    return smartmove_hide_from_search_engines() ? 'noindex, nofollow' : $robots;
}
add_filter( 'wpseo_robots', 'smartmove_yoast_robots_noindex', 99 );

/**
 * Use the file's modification time as the asset version, so browsers
 * fetch a fresh copy whenever a stylesheet changes.
 */
function smartmove_asset_version( $relative_path ) {
    $file = get_template_directory() . $relative_path;
    return file_exists( $file ) ? filemtime( $file ) : null;
}

// Load Bootstrap + Theme CSS
function mytheme_enqueue_styles() {
    // Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');

     // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css');


      // Google Fonts - Sora
    wp_enqueue_style('mytheme-google-fonts','https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap',array(),null);


    // AOS CSS
    wp_enqueue_style('aos-css','https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',array(),'2.3.4');
    


     // AOS JS
    wp_enqueue_script('aos-js','https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',array(),'2.3.4',true);

    // Desktop CSS (default)
    wp_enqueue_style('desktop-css', get_template_directory_uri() . '/assets/css/main.css', array(), smartmove_asset_version('/assets/css/main.css'));
	wp_enqueue_style('desktop-css-about', get_template_directory_uri() . '/assets/css/about.css', array(), smartmove_asset_version('/assets/css/about.css'));
	wp_enqueue_style('desktop-css-count', get_template_directory_uri() . '/assets/css/counter.css', array(), smartmove_asset_version('/assets/css/counter.css'));
	wp_enqueue_style('desktop-css-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), smartmove_asset_version('/assets/css/footer.css'));
	wp_enqueue_style('desktop-css-fleets', get_template_directory_uri() . '/assets/css/fleets.css', array(), smartmove_asset_version('/assets/css/fleets.css'));
	wp_enqueue_style('desktop-css-testimonials', get_template_directory_uri() . '/assets/css/testimonials.css', array(), smartmove_asset_version('/assets/css/testimonials.css'));
	wp_enqueue_style('desktop-css-faq', get_template_directory_uri() . '/assets/css/faq.css', array(), smartmove_asset_version('/assets/css/faq.css'));
	wp_enqueue_style('desktop-css-blogs', get_template_directory_uri() . '/assets/css/blogs.css', array(), smartmove_asset_version('/assets/css/blogs.css'));
	wp_enqueue_style('desktop-css-single-service', get_template_directory_uri() . '/assets/css/single-service.css', array(), smartmove_asset_version('/assets/css/single-service.css'));
	
    // Theme style.css (required by WordPress, can be empty or minimal)
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), smartmove_asset_version('/style.css'));

   
     // Custom JS (your own scripts)
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery']);	
	
	
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');





// Add Theme Support


function mytheme_setup() {
    add_theme_support( 'title-tag' );
      add_theme_support('site-icon');


    // Enable support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,   // Suggested height
        'width'       => 300,   // Suggested width
        'flex-height' => true,  // Allow flexible height
        'flex-width'  => true,  // Allow flexible width
    ) );


    add_theme_support('post-thumbnails');


   
}
add_action( 'after_setup_theme', 'mytheme_setup' );

//add excerpt
function add_excerpt_support_for_pages() {
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'add_excerpt_support_for_pages');



// Reegister Menu

function bleizure_register_menus() {
    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'bleizure'),
        'footer_services' => __('Footer Services', 'mytheme'),
        'secondary_menu' => __('Secondary Menu', 'mytheme'),
    ]);
}
add_action('after_setup_theme', 'bleizure_register_menus');




// Add classes to <a> tags for the footer services menu
function mytheme_footer_services_link_classes( $atts, $item, $args ) {
  if ( isset($args->theme_location) && $args->theme_location === 'footer_services' ) {
    // keep your exact classes
    $existing = isset($atts['class']) ? $atts['class'].' ' : '';
    $atts['class'] = $existing . 'text-dark text-decoration-none';
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'mytheme_footer_services_link_classes', 10, 3);


// Add custom classes to footer secondary (Quick Links) menu <a> tags
function mytheme_footer_secondary_link_classes( $atts, $item, $args ) {
  if ( isset($args->theme_location) && $args->theme_location === 'secondary_menu' ) {
    $existing = isset($atts['class']) ? $atts['class'].' ' : '';
    $atts['class'] = $existing . 'text-dark text-decoration-none';
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'mytheme_footer_secondary_link_classes', 10, 3);


function enqueue_swiper_assets() {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');




function smartmove_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'smartmove_enqueue_styles' );


/**
 * Include Custom Post Types in standard category archives
 */
function include_cpt_in_category_archives( $query ) {
    // Only modify the main query on the frontend category archive pages
    if ( ! is_admin() && $query->is_main_query() && $query->is_category() ) {

        // Replace 'your_cpt_name' with your actual Custom Post Type slug
        $query->set( 'post_type', array( 'post', 'fleet' ) );
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );

    }
}
add_action( 'pre_get_posts', 'include_cpt_in_category_archives' );



function enqueue_custom_distorted_slider() {
    // Custom Slider Script
    $custom_slider_js = "
    document.addEventListener('DOMContentLoaded', function() {
        var sliderEl = document.querySelector('.main-slider-two__carousel');
        if (!sliderEl) return;

        // 1. Inject SVG Distortion Filter into DOM
        var svgFilterHTML = `
            <svg style=\"position: absolute; width: 0; height: 0; overflow: hidden;\" aria-hidden=\"true\">
                <filter id=\"slide-distortion-filter\">
                    <feTurbulence type=\"fractalNoise\" baseFrequency=\"0.015 0.04\" numOctaves=\"2\" result=\"noise\" />
                    <feDisplacementMap in=\"SourceGraphic\" in2=\"noise\" scale=\"0\" xChannelSelector=\"R\" yChannelSelector=\"G\" id=\"distortion-map\" />
                </filter>
            </svg>
        `;
        document.body.insertAdjacentHTML('beforeend', svgFilterHTML);

        var slides = sliderEl.querySelectorAll('.slide-item');
        if (slides.length === 0) return;

        var filterMap = document.getElementById('distortion-map');
        var currentIndex = 0;
        var isAnimating = false;
        var autoPlayTimer = null;

        // Initialize slides
        slides.forEach(function(slide, idx) {
            if (idx === 0) {
                slide.classList.add('is-active');
            } else {
                slide.classList.remove('is-active');
            }
        });

        // Main Transition Function
        function goToSlide(nextIndex) {
            if (isAnimating || nextIndex === currentIndex) return;
            isAnimating = true;

            var currentSlide = slides[currentIndex];
            var nextSlide = slides[nextIndex];

            // Apply distortion filter to current active slide
            currentSlide.style.filter = 'url(#slide-distortion-filter)';

            // Animate SVG Distortion Scale (Ramp Up -> Peak -> Ramp Down)
            var startTime = performance.now();
            var duration = 900; // Total transition time in ms

            function animateDistortion(now) {
                var elapsed = now - startTime;
                var progress = Math.min(elapsed / duration, 1);

                // Calculate distortion wave amplitude curve (0 -> 45 -> 0)
                var distortionScale = Math.sin(progress * Math.PI) * 45;
                if (filterMap) {
                    filterMap.setAttribute('scale', distortionScale);
                }

                // Midway through distortion, swap slide visibility
                if (progress >= 0.4 && !nextSlide.classList.contains('is-active')) {
                    currentSlide.classList.remove('is-active');
                    nextSlide.classList.add('is-active');
                    nextSlide.style.filter = 'url(#slide-distortion-filter)';
                }

                if (progress < 1) {
                    requestAnimationFrame(animateDistortion);
                } else {
                    // Reset filters after transition ends
                    currentSlide.style.filter = 'none';
                    nextSlide.style.filter = 'none';
                    if (filterMap) filterMap.setAttribute('scale', '0');
                    
                    currentIndex = nextIndex;
                    isAnimating = false;
                }
            }

            requestAnimationFrame(animateDistortion);
        }

        function nextSlide() {
            var next = (currentIndex + 1) % slides.length;
            goToSlide(next);
        }

        function prevSlide() {
            var prev = (currentIndex - 1 + slides.length) % slides.length;
            goToSlide(prev);
        }

        // AutoPlay logic
        function startAutoPlay() {
            autoPlayTimer = setInterval(nextSlide, 5000);
        }
        function resetAutoPlay() {
            clearInterval(autoPlayTimer);
            startAutoPlay();
        }
        startAutoPlay();

        // Navigation Button Listeners
        var nextBtn = sliderEl.querySelector('.slider-next');
        var prevBtn = sliderEl.querySelector('.slider-prev');
        if (nextBtn) nextBtn.addEventListener('click', function() { nextSlide(); resetAutoPlay(); });
        if (prevBtn) prevBtn.addEventListener('click', function() { prevSlide(); resetAutoPlay(); });

        // Touch Swipe Gesture Support
        var touchStartX = 0;
        var touchEndX = 0;

        sliderEl.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        sliderEl.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            var diff = touchStartX - touchEndX;

            if (Math.abs(diff) > 40) { // Touch threshold
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                resetAutoPlay();
            }
        }, { passive: true });
    });
    ";
    wp_add_inline_script('jquery', $custom_slider_js);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_distorted_slider');