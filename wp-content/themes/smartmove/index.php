 <?php get_header(); ?>


    
<!-- Section 1: Banner -->
   
<!-- Section 1: Banner -->
<?php get_template_part( 'template-parts/banner-archive' ); ?>




             <!----------blog --------------->

<?php
  $args = array(
    'post_type'      => 'post',    // your CPT slug
    'posts_per_page' => -1,        // -1 = get ALL posts
    'orderby'        => 'date',
    'order'          => 'ASC'
);


  $query = new WP_Query($args);

?>





<!-- Blog Section -->
<section class="blogs-section py-5" style="background-color: white;">
  <div class="container text-center">
    <!-- Section Title -->
    <h2 class="section-title mb-5 fade-left" data-aos="fade-up">
      OUR <span class="highlight">BLOGS</span>
    </h2>

    <!-- Blog Cards Row -->
    <div class="row g-4">
      <?php if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
        
        <!-- Single Blog Card -->
<div class="col-lg-4 col-md-6" data-aos="fade-up">
  <div class="blog-card">
    <a href="<?php the_permalink(); ?>" class="blog-card-link">
      <div class="blog-img-wrapper animated-image">
        <?php if ( has_post_thumbnail() ) : ?>
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="blog-card-img" alt="<?php the_title_attribute(); ?>" />
        <?php else: ?>
          <div class="blog-placeholder"></div>
        <?php endif; ?>
        <div class="blog-date-badge"><?php echo get_the_date('M d'); ?></div>
      </div>
    </a>

    <div class="blog-card-body text-start">
      <h3 class="blog-title fade-left">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>
      <div class="blog-excerpt">
        <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
      </div>
      <a href="<?php the_permalink(); ?>" class="read-more-link">
        Read Story <i class="fas fa-long-arrow-alt-right"></i>
      </a>
    </div>
  </div>
</div>

      <?php endwhile; 
        wp_reset_postdata();
      else : ?>
        <p>No Blogs Found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

  















 <?php get_template_part('template-parts/hero','booking'); ?>










  <?php get_footer(); ?>