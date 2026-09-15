<?php get_header(); ?>
    
<!-- Section 1: Banner (UNCHANGED) -->
<?php get_template_part( 'template-parts/banner-archive' ); ?>

<section class="single-blog-wrapper py-5 bg-light">
  <div class="container">
    <div class="row">
      <!-- Changed from col-lg-8 justify-content-center to col-lg-12 left-aligned -->
      <div class="col-lg-12"> 

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <!-- Blog Title (Left-aligned, aligns with your banner layout) -->
          <h1 class="single-blog-title display-5 fw-bold mb-3 text-dark text-start fade-left"><?php the_title(); ?></h1>

          <!-- Meta Info (Left-aligned, clean contrast) -->
          <div class="single-blog-meta mb-5 d-flex flex-wrap gap-3 align-items-center text-muted small text-start">
            <span><i class="bi bi-person me-1"></i> <?php the_author(); ?></span>
            <span class="meta-divider">|</span>
            <span><i class="bi bi-calendar-event me-1"></i> <?php echo get_the_date(); ?></span>
          </div>

          <!-- Blog Content (Left-aligned typography, clean margins) -->
          <div class="single-blog-content animate-fade entry-content mb-5 text-start">
           <p class=" fade-right">
			    <?php the_content(); ?>
			  </p>
          </div>

          <!-- Tags -->
          <?php if(has_tag()): ?>
            <div class="single-blog-tags pt-4 border-top mb-5 text-start">
              <?php the_tags('<span class="fw-bold me-2 text-secondary">Tags:</span> <span class="badge bg-outline-dark text-dark border me-1">', '</span><span class="badge bg-outline-dark text-dark border me-1">', '</span>'); ?>
            </div>
          <?php endif; ?>

          <!-- 🔥 Related Posts Section (Left-aligned grid & Fixed Image Mismatch) -->
          <div class="related-posts-section pt-5 border-top mb-5 text-start">
            <h3 class="mb-4 fw-bold section-title fade-left">Related Posts</h3>
            <div class="row g-4">
                <?php
                $related = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => wp_get_post_categories(get_the_ID())
                ));
                if ($related->have_posts()) :
                    while ($related->have_posts()) : $related->the_post(); ?>
                        <div class="col-md-4">
                            <div class="related-modern-card h-100 animate-fade d-flex flex-column">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark d-flex flex-column h-100">
                                    <div class="related-img-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium_large', ['class' => 'related-card-img']); ?>
                                        <?php else: ?>
                                            <div class="placeholder-img-fallback d-flex align-items-center justify-content-center bg-secondary text-white-50">
                                                <i class="bi bi-image fs-3"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="related-card-body p-3 d-flex flex-column flex-grow-1 justify-content-between">
                                        <h5 class="related-card-title mb-2 text-start fade-left"><?php the_title(); ?></h5>
                                        <span class="related-card-date text-muted small text-start fade-right"><i class="bi bi-calendar3 me-1"></i><?php echo get_the_date(); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                else : ?>
                    <div class="col-12">
                        <p class="text-muted italic">No related posts found.</p>
                    </div>
                <?php endif; ?>
            </div>
          </div>

          <!-- Navigation -->
          <div class="single-blog-nav d-flex justify-content-between align-items-center pt-4 border-top">
            <div class="prev-link"><?php previous_post_link('%link', '<i class="bi bi-arrow-left me-2"></i> %title'); ?></div>
            <div class="next-link"><?php next_post_link('%link', '%title <i class="bi bi-arrow-right ms-2"></i>'); ?></div>
          </div>

        <?php endwhile; endif; ?>

      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/hero','booking'); ?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-fade");
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, { threshold: 0.1 });

    elements.forEach(el => observer.observe(el));
  });
</script>
<style>
    /* ==========================================================================
   Single Blog Left-Aligned Typography & Card Fixes
   ========================================================================== */

/* Left-aligned clean layout spacing */
.single-blog-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #2b2b2b;
    text-align: left;
}

.single-blog-content p {
    margin-bottom: 1.75rem;
}

.single-blog-content h2, 
.single-blog-content h3, 
.single-blog-content h4 {
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
    font-weight: 700;
    color: #111;
    text-align: left;
}

/* Fix Mismatch Images inside Related Cards */
.related-modern-card {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(0,0,0,0.06);
}

.related-modern-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
}

/* Forces unified grid rendering regardless of raw asset dimensions */
.related-img-wrapper {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* Fixed 16:9 aspect ratio box */
    overflow: hidden;
    background-color: #f0f0f0;
}

.related-card-img, 
.placeholder-img-fallback {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Keeps image sharp without distorting aspect ratio */
    transition: transform 0.5s ease;
}

.related-modern-card:hover .related-card-img {
    transform: scale(1.05);
}

.related-card-title {
    font-size: 1.05rem;
    font-weight: 600;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Clips long titles at 2 lines elegantly */
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Scroll Animation Transitions */
.animate-fade {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.animate-fade.visible {
    opacity: 1;
    transform: translateY(0);
}

.single-blog-nav a {
    color: #111;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s ease;
}
.single-blog-nav a:hover {
    color: #0056b3;
}
    
</style>

<?php get_footer(); ?>