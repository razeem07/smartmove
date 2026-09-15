<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/fav.png" type="image/png">

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NNBKKBB2');</script>
  
  <meta name="google-site-verification" content="2ZAu435gdoGvs41eQ_Hha4pWoFOrY8lWdwPGzwdQe_I" />
  
  <style>
    /* Force Mobile Toggler Visibility */
    @media (max-width: 1199px) {
        .mobile-nav__toggler {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
    }
    .custom-logo-link img { max-width: 250px; height: auto; }
    .admin-bar .main-header-two { top: 32px; }

    /* Modern Glassmorphism Call Badge Container */
    .call-badge-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 50px;
        padding: 6px 20px 6px 8px;
        transition: all 0.3s ease;
    }

    .call-badge-card-sticky {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 50px;
        padding: 6px 20px 6px 8px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.15);
        border-color: #ff6600;
        transform: translateY(-1px);
    }
	  
    .call-badge-card:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: #ff6600;
        transform: translateY(-1px);
    }

    .main-menu-two__call {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Icon Badge Circle */
    .main-menu-two__call-icon {
        width: 38px;
        height: 38px;
        background-color: #ff6600;
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(255, 102, 0, 0.3);
    }

    /* Text Typography */
    .main-menu-two__call-title {
        display: block;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 2px;
        line-height: 1;
    }
	  
    .main-menu-two__call-title-sticky {
        display: block;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #ff6600;
        margin-bottom: 2px;
        line-height: 1;
    } 
	  
	  
    .main-menu-two__call-number h5,
    .main-menu-two__call-number {
        margin: 0;
        line-height: 1.1;
    }

    .main-menu-two__call-number a {
        color: #ffffff !important;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .main-menu-two__call-number-sticky a {
        color: #ff6600 !important;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        transition: color 0.3s ease;
    } 
	  
    .main-menu-two__call-number a:hover {
        color: #ff6600 !important;
    }
  </style>

  <?php wp_head(); ?>
</head>

<body class="body-bg-color">

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNBKKBB2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php 
  $phone_number = get_theme_mod('footer_whatsapp');
  $email_address = get_theme_mod('footer_email');
  $wa_number = preg_replace('/\D+/', '', $phone_number); 
?>

<div class="page-wrapper">
    <!-- Main Header -->
    <header class="main-header-two">
        <div class="main-header-two__wrapper">
            <nav class="main-menu main-menu-two">
                <div class="main-menu-two__wrapper">
                    <div class="container">
                        <div class="main-menu-two__wrapper-inner">
                            <div class="main-menu-two__left">
                                <div class="main-header-two__logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php if ( has_custom_logo() ) { the_custom_logo(); } else { echo '<h3 style="margin:0; color:#fff;">' . get_bloginfo( 'name' ) . '</h3>'; } ?>
                                    </a>
                                </div>
                            </div>
                            <div class="main-menu-two__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary_menu',
                                    'menu_class'      => 'main-menu__list',
                                    'container'       => false,
                                    'fallback_cb'     => '__return_false',
                                ) );
                                ?>
                            </div>
                            <div class="main-menu-two__right call-badge-card">
                                <div class="main-menu-two__call">
                                    <div class="main-menu-two__call-icon"><i class="fa fa-phone"></i></div>
                                    <div class="main-menu-two__call-content">
                                        <span class="main-menu-two__call-title">24/7 Hotline Number</span>
                                        <h5 class="main-menu-two__call-number">
                                            <a href="tel:<?php echo $wa_number; ?>"><?php echo $phone_number; ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Sticky Header -->
    <div class="stricky-header stricked-menu main-menu main-menu-two">
        <div class="sticky-header__content">
            <div class="main-menu-two__wrapper">
                <div class="container">
                    <div class="main-menu-two__wrapper-inner">
                        <div class="main-menu-two__left">
                            <div class="main-header-two__logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                                <img src="<?php echo esc_url( content_url( '/uploads/2026/04/screenshot.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" style="max-height: 50px; width: auto;">
                            </a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary_menu',
                                'menu_class'      => 'main-menu__list',
                                'container'       => false,
                                ) );
                            ?>
                        </div>
                        <div class="main-menu-two__right call-badge-card-sticky">
                            <div class="main-menu-two__call">
                                <div class="main-menu-two__call-icon"><i class="fa fa-phone"></i></div>
                                <div class="main-menu-two__call-content">
                                    <span class="main-menu-two__call-title-sticky">24/7 Hotline Number</span>
                                    <h5 class="main-menu-two__call-number-sticky">
                                        <a href="tel:<?php echo $wa_number; ?>"><?php echo $phone_number; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Mobile Toggle Menu -->
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="logo image">
                <?php if ( has_custom_logo() ) : ?>
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>
                    <img src="<?php echo esc_url( $logo[0] ); ?>" width="135" alt="<?php bloginfo( 'name' ); ?>">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resources/logo-1.png" width="135" alt="<?php bloginfo( 'name' ); ?>">
                <?php endif; ?>
            </a>
        </div>

        <div class="mobile-nav__container">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary_menu',
                'container'      => false,
                'menu_class'     => 'main-menu__list',
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ) );
            ?>
        </div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:<?php echo sanitize_email( get_theme_mod('footer_email') ); ?>">
                    <?php echo esc_html( get_theme_mod('footer_email') ); ?>
                </a>
            </li>
            <li>
                <i class="fas fa-phone"></i>
                <?php 
                    $phone =  get_theme_mod('footer_phone');
                    $phone_tel = preg_replace('/[^0-9]/', '', $phone);
                ?>
                <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"><?php echo esc_html( $phone ); ?></a>
            </li>
        </ul>

        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="<?php echo esc_url( get_theme_mod( 'facebook_url', '#' ) ); ?>" class="fab fa-facebook-square"></a>
                <a href="<?php echo esc_url( get_theme_mod( 'instagram_url', '#' ) ); ?>" class="fab fa-instagram"></a>
            </div>
        </div>

    </div>
</div>