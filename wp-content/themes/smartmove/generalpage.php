<?php /* Template Name: generalpage
        Template Post Type: page,post */
 ?>

 <?php get_header(); ?>


<!-- Section 1: Banner -->
<section class="about-banner">
  <img src="<?php echo esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'banner_image', true ), 'full' ) ); ?>" alt="Banner">
  <div class="overlay"></div>
  <div class="content container">
    <h1 class="fw-bold"><?php the_title(); ?></h1>
  
  </div>
</section>




<!-- Section 2: Content -->
<section class="policy-content py-5">
  <div class="container">
    <div class="content-wrapper mx-auto" style="max-width: 800px;">
      <h2 class="fw-bold mb-4 text-center fade-left"><?php the_title(); ?></h2>
      <div class="page-content">
        <?php 
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        ?>
      </div>
    </div>
  </div>
</section>



 <?php get_template_part('template-parts/hero','booking'); ?>

<?php get_footer(); ?>