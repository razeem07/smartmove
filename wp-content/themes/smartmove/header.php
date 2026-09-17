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

    /* Navbar Fleet Search */
    .main-menu-two__search {
        position: relative;
        display: flex;
        align-items: center;
    }

    .main-menu-two__search-toggle {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .main-menu-two__search--sticky .main-menu-two__search-toggle {
        border-color: rgba(0, 0, 0, 0.15);
        background: rgba(0, 0, 0, 0.04);
        color: #222;
    }

    .main-menu-two__search-toggle:hover {
        background: #ff6600;
        border-color: #ff6600;
        color: #fff;
    }

    /* Drops down below the icon rather than pushing the navbar sideways */
    .main-menu-two__search-form {
        position: absolute;
        top: calc(100% + 14px);
        right: 0;
        width: 280px;
        max-width: 80vw;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
        padding: 0 14px;
        transition: max-height 0.3s ease, opacity 0.25s ease, padding 0.3s ease;
        z-index: 100;
    }

    .main-menu-two__search.is-active .main-menu-two__search-form {
        max-height: 70px;
        opacity: 1;
        visibility: visible;
        padding: 12px 14px;
    }

    .main-menu-two__search-input {
        width: 100%;
        padding: 8px 14px;
        border-radius: 50px;
        border: 1px solid #e2e2e2;
        background: #fff;
        color: #222;
        font-size: 13px;
    }

    .main-menu-two__search-input::placeholder {
        color: #999;
    }

    .main-menu-two__search-input:focus {
        outline: none;
        border-color: #ff6600;
    }

    @media (max-width: 1199px) {
        .main-menu-two__search {
            display: none;
        }
    }

    /* Mobile Nav Search */
    .mobile-nav__search-form {
        position: relative;
        margin: 0 0 20px 0;
    }

    .mobile-nav__search-icon {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: #999;
        font-size: 13px;
        pointer-events: none;
    }

    .mobile-nav__search-input {
        width: 100%;
        padding: 10px 14px 10px 36px;
        border-radius: 50px;
        border: 1px solid #e2e2e2;
        font-size: 14px;
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
                            <?php smartmove_render_navbar_search( 'main' ); ?>
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
                        <?php smartmove_render_navbar_search( 'sticky' ); ?>
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

        <form class="mobile-nav__search-form" action="<?php echo esc_url( home_url( '/our-fleets/' ) ); ?>" method="get">
            <i class="fa fa-search mobile-nav__search-icon"></i>
            <input type="text" name="fleet_search" class="mobile-nav__search-input" placeholder="Search fleets by name or brand...">
        </form>

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

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.main-menu-two__search').forEach(function (wrap) {
        var toggle = wrap.querySelector('.main-menu-two__search-toggle');
        var input = wrap.querySelector('.main-menu-two__search-input');
        if (!toggle || !input) return;

        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            var isActive = wrap.classList.contains('is-active');
            document.querySelectorAll('.main-menu-two__search.is-active').forEach(function (openWrap) {
                openWrap.classList.remove('is-active');
            });
            if (!isActive) {
                wrap.classList.add('is-active');
                input.focus();
            }
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.main-menu-two__search')) {
            document.querySelectorAll('.main-menu-two__search.is-active').forEach(function (wrap) {
                wrap.classList.remove('is-active');
            });
        }
    });
});
</script>