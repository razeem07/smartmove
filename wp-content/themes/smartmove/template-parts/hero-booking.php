


<?php
// 'Hero_Footer' was never a real field (no field group ever defined it and no
// postmeta was ever populated for it) — this block has never rendered
// anything. Kept inert rather than migrated; see migration notes.
$home_page = get_page_by_path('home');

if ($home_page) :
    $hero = false;
    if ($hero) : ?>
    
        <section class="hero-section d-flex align-items-center justify-content-center text-center position-relative">
            <?php if (!empty($hero['Hero_Footer_Background'])): ?>
                <img 
                    src="<?php echo esc_url($hero['Hero_Footer_Background']); ?>" 
                    alt="Hero Background" 
                    class="hero-bg"
                >
            <?php endif; ?>

            <div class="hero-overlay"></div>
            <div class="container hero-content" data-aos="fade-up">
                <h2 class="hero-title"><?php echo esc_html($hero['Hero_Footer_Title']); ?></h2>
                <a href="https://wa.me/971502584311" class="btn hero-btn mt-4" target="_blank">Book Now →</a>
            </div>
        </section>
    
    <?php endif;
endif;
?>
