<?php /* Template Name: contactpage
        Template Post Type: page,post */
 ?>

 <?php get_header(); ?>

<!-- Section 1: Banner -->
<?php get_template_part( 'template-parts/banner-common' ); ?>

<!-- Section 2: Contact Info (Using Theme Mods) -->
<section class="contact-info blogs-section py-5">
  <div class="container">
    <div class="row g-4 justify-content-center">
      
      <!-- Phone -->
      <?php if ( get_theme_mod('footer_phone') ) : ?>
      <div class="col-md-4 col-sm-6" data-aos="fade-up">
        <div class="contact-box text-center p-4 h-100 shadow-sm">
          <div class="icon-circle mb-3">
            <i class="bi bi-telephone-fill"></i>
          </div>
          <h5 class="fw-bold  fade-left">Phone / WhatsApp</h5>
          <p class="mb-0">
            <a href="tel:<?php echo preg_replace('/\D+/', '', get_theme_mod('footer_whatsapp')); ?>" class="text-decoration-none text-dark">
                <?php echo esc_html(get_theme_mod('footer_whatsapp')); ?>
            </a>
          </p>
        </div>
      </div>
      <?php endif; ?>

      <!-- Address -->
      <?php if ( get_theme_mod('footer_address') ) : ?>
      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
        <div class="contact-box text-center p-4 h-100 shadow-sm">
          <div class="icon-circle mb-3">
            <i class="bi bi-geo-alt-fill"></i>
          </div>
          <h5 class="fw-bold  fade-left">Address</h5>
          <p class="mb-0 text-dark  fade-bottom">
           <?php echo esc_html(get_theme_mod('footer_address')); ?>
          </p>
        </div>
      </div>
      <?php endif; ?>

      <!-- Email -->
      <?php if ( get_theme_mod('footer_email') ) : ?>
      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
        <div class="contact-box text-center p-4 h-100 shadow-sm">
          <div class="icon-circle mb-3">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <h5 class="fw-bold fade-left">Email</h5>
          <p class="mb-0 fade-bottom">
            <a href="mailto:<?php echo antispambot(get_theme_mod('footer_email')); ?>" class="text-decoration-none text-dark">
                <?php echo esc_html(get_theme_mod('footer_email')); ?>
            </a>
          </p>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<!-- Section 3: Boxed Layout -->
<section class="contact-boxed py-5">
  <div class="container content">
    <div class="contact-card shadow-lg rounded bg-white p-lg-5 p-4">
      <div class="row g-5">
        <!-- Map (Kept ACF for map as it's usually unique to contact page) -->
        <div class="col-lg-6" data-aos="fade-right">
          <h4 class="fw-bold mb-4 fade-left">Find Us On Map</h4>
          <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm" style="min-height:400px">
			  <?php $smartmove_google_map = get_post_meta( get_the_ID(), 'google_map', true ); ?>
			  <iframe src="<?php echo esc_url( $smartmove_google_map ? $smartmove_google_map : '' ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        
        <!-- Formurator Form 406 -->
        <div class="col-lg-6" data-aos="fade-left">
          <div class="form-container">
            <h4 class="fw-bold mb-2 text-uppercase fade-left">Send Us a Message</h4>
            <p class="text-muted mb-4 fade-right">We'll get back to you within 24 hours.</p>
            
            <div class="modern-forminator fade-bottom">
                <?php echo do_shortcode('[forminator_form id="406"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>