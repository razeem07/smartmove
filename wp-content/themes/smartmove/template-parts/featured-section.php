<?php
// Get the page ID of "home" by slug
$home = get_page_by_path('home');
$home_id = $home ? $home->ID : 0;
?>

<?php if ( $home_id ) : ?>
<section class="features-section py-5">
  <div class="container">
    <div class="row text-center features-row">

      <!-- Feature 1 -->
      <div class="feature-col mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-box">
          <img src="<?php echo esc_url( get_post_meta( $home_id, 'featured_image_1', true ) ); ?>" alt="Feature 1" class="feature-img mb-3" />
          <h4 class="feature-title"><?php echo esc_html( get_post_meta( $home_id, 'featured_title_1', true ) ); ?></h4>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="feature-col mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="feature-box">
          <img src="<?php echo esc_url( get_post_meta( $home_id, 'featured_image_2', true ) ); ?>" alt="Feature 2" class="feature-img mb-3" />
          <h4 class="feature-title"><?php echo esc_html( get_post_meta( $home_id, 'featured_title_2', true ) ); ?></h4>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="feature-col mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="feature-box">
          <img src="<?php echo esc_url( get_post_meta( $home_id, 'featured_image_3', true ) ); ?>" alt="Feature 3" class="feature-img mb-3" />
          <h4 class="feature-title"><?php echo esc_html( get_post_meta( $home_id, 'featured_title_3', true ) ); ?></h4>
        </div>
      </div>

      <!-- Feature 4 -->
      <div class="feature-col mb-4" data-aos="fade-up" data-aos-delay="400">
        <div class="feature-box">
          <img src="<?php echo esc_url( get_post_meta( $home_id, 'featured_image_4', true ) ); ?>" alt="Feature 4" class="feature-img mb-3" />
          <h4 class="feature-title"><?php echo esc_html( get_post_meta( $home_id, 'featured_title_4', true ) ); ?></h4>
        </div>
      </div>

      <!-- Feature 5 -->
      <div class="feature-col mb-4" data-aos="fade-up" data-aos-delay="500">
        <div class="feature-box">
          <img src="<?php echo esc_url( get_post_meta( $home_id, 'featured_image_5', true ) ); ?>" alt="Feature 5" class="feature-img mb-3" />
          <h4 class="feature-title"><?php echo esc_html( get_post_meta( $home_id, 'featured_title_5', true ) ); ?></h4>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>

<style>
.features-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.feature-col {
  flex: 0 0 20%; /* 5 columns = 20% width each */
  max-width: 20%;
  padding: 0 10px; /* optional spacing */
  box-sizing: border-box;
}

@media (max-width: 992px) {
  .feature-col {
    flex: 0 0 50%;
    max-width: 50%;
    margin-bottom: 30px;
  }
}

@media (max-width: 576px) {
  .feature-col {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

</style>

