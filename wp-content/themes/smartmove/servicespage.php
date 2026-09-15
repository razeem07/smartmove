<?php /* Template Name: Our Services Page
        Template Post Type: page,post */
 ?>

 <?php get_header(); ?>

<?php get_template_part( 'template-parts/banner-common' ); ?>

<?php
$args = array(
    'post_type'      => 'service',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'posts_per_page' => -1, // Ensures all services show up
);

$services_query = new WP_Query($args);

if ($services_query->have_posts()) : ?>
    <section class="services-grid-section ">
        <div class="container">
            <div class="row">
                <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
<div class="col-lg-4 col-md-6 mb-4">
    <div class="service-card">
        <?php if (has_post_thumbnail()) : ?>
            <div class="service-card__image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large'); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="service-card__body">
            <h3 class="service-card__title fade-left">
                <a href="#"><?php the_title(); ?></a>
            </h3>
            
            <div class="service-card__excerpt">
                <p clas=" fade-right">
					<?php echo get_the_content(); ?>
				</p>
            </div>
            
<!--             <a href="<?php the_permalink(); ?>" class="service-card__btn">
                View Service
            </a> -->
        </div>
    </div>
</div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

 <?php get_footer(); ?>