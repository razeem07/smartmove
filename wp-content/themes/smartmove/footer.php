<footer class="site-footer site-footer-two">
    <div class="site-footer__wrap">
        <div class="site-footer-two__shape-1"></div>
        <div class="site-footer-two__shape-2"></div>
        <div class="site-footer__top">
            <div class="container">
                <div class="site-footer__top-inner">
                    <div class="row">
                        <!-- COLUMN 1: ABOUT & CONTACT -->
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="100ms">
                            <div class="footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <?php if ( get_theme_mod('footer_logo') ) : ?>
                                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                                            <img style="width:250px;" src="<?php echo esc_url( get_theme_mod('footer_logo') ); ?>" alt="Footer Logo">
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="footer-widget__contact-info">
                                    <ul class="footer-widget__contact-list list-unstyled">
                                        <?php if ( get_theme_mod('footer_address') ) : ?>
                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-pin"></span>
                                                <p>Address</p>
                                            </div>
                                            <p class="footer-widget__contact-text"><?php echo esc_html( get_theme_mod('footer_address') ); ?></p>
                                        </li>
                                        <?php endif; ?>

                                        <?php if ( get_theme_mod('footer_phone') ) : 
                                            $phone = get_theme_mod('footer_phone');
                                            $phone_link = preg_replace('/\D+/', '', $phone); ?>
                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-phone"></span>
                                                <p>Phone Number</p>
                                            </div>
                                            <p class="footer-widget__contact-text">
                                                <a href="tel:<?php echo esc_attr($phone_link); ?>"><?php echo esc_html($phone); ?></a>
                                            </p>
                                        </li>
                                        <?php endif; ?>
                                        
                                        <?php if ( get_theme_mod('footer_whatsapp') ) : 
                                            $phone = get_theme_mod('footer_whatsapp');
                                            $phone_link = preg_replace('/\D+/', '', $phone); ?>
                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-phone"></span>
                                                <p>Whatsapp Number</p>
                                            </div>
                                            <p class="footer-widget__contact-text">
                                                <a href="https://wa.me/<?php echo esc_attr($phone_link); ?>" target="_blank" rel="noopener"><?php echo esc_html($phone); ?></a>
                                            </p>
                                        </li>
                                        <?php endif; ?>

                                        <?php
                                        $footer_emails = array_filter( array( get_theme_mod( 'footer_email' ), get_theme_mod( 'footer_email_2' ) ) );
                                        if ( $footer_emails ) : ?>
                                        <li>
                                            <div class="footer-widget__contact-icon-box">
                                                <span class="icon-mail"></span>
                                                <p>Email</p>
                                            </div>
                                            <?php foreach ( $footer_emails as $footer_email ) : ?>
                                            <p class="footer-widget__contact-text">
                                                <a href="mailto:<?php echo antispambot( $footer_email ); ?>"><?php echo esc_html( $footer_email ); ?></a>
                                            </p>
                                            <?php endforeach; ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2: PAGES (Primary Menu) -->
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                            <div class="footer-widget__page-link">
                                <h4 class="footer-widget__title">Pages</h4>
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'primary_menu',
                                    'container'      => false,
                                    'menu_class'     => 'footer-widget__page-link-list list-unstyled',
                                    'fallback_cb'    => false,
                                    'depth'          => 1,
                                    // Custom walker or filters may be needed if your theme requires the <span class="icon-double-arrow-right"></span> inside <a> tags
                                ]);
                                ?>
                            </div>
                        </div>

                        <!-- COLUMN 3: SOCIAL MEDIA -->
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="400ms">
                            <div class="footer-widget__social-box">
                                <h4 class="footer-widget__title">Smart Move Dubai</h4>
                                <?php if ( get_theme_mod('footer_description') ) : ?>
                                    <p class="footer-widget__social-text"><?php echo esc_html( get_theme_mod('footer_description') ); ?></p>
                                <?php endif; ?>
                                
                                <div class="footer-widget__social">
    <?php if ( get_theme_mod('footer_facebook') ) : ?>
        <a href="<?php echo esc_url( get_theme_mod('footer_facebook') ); ?>">
            <i class="fab fa-facebook-f"></i>
        </a>
    <?php endif; ?>

    <?php if ( get_theme_mod('footer_twitter') ) : ?>
        <a href="<?php echo esc_url( get_theme_mod('footer_twitter') ); ?>">
            <i class="fab fa-twitter"></i>
        </a>
    <?php endif; ?>

    <?php if ( get_theme_mod('footer_instagram') ) : ?>
        <a href="<?php echo esc_url( get_theme_mod('footer_instagram') ); ?>">
            <i class="fab fa-instagram"></i>
        </a>
    <?php endif; ?>

    <?php if ( get_theme_mod('footer_linkedin') ) : ?>
        <a href="<?php echo esc_url( get_theme_mod('footer_linkedin') ); ?>">
            <i class="fab fa-linkedin-in"></i>
        </a>
    <?php endif; ?>
</div>

                            </div>
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="site-footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__copyright">
                                <p class="site-footer__copyright-text">
                                    <?php echo wp_kses_post( get_theme_mod( 'footer_copyright', 'Copyright ©' . date("Y") . ' Crank. All rights reserved.' ) ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
$wa_digits = preg_replace( '/\D+/', '', get_theme_mod( 'footer_whatsapp' ) );
if ( $wa_digits ) :
    $wa_text = rawurlencode( 'Hello Smart Move, I would like to enquire about a car rental.' );
?>
    <a href="https://wa.me/<?php echo esc_attr( $wa_digits ); ?>?text=<?php echo esc_attr( $wa_text ); ?>" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
    </a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>