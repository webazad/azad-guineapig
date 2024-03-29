<?php
/**
*------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*------------------------------------
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( "charset" ); ?>" />
        <!-- device code -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!-- to make the header scripts works -->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <?php
			do_action( 'azad_x_header' );
                        
            if ( get_theme_mod( 'preloader_settings', false ) ) : ?>
                <!-- PRELOADER BEGINS -->
                <div id="preloader" class="preloader">
                    <div class="inner">
                        <figure class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo-white.png" alt="Image"></figure>
                        <span class="percentage"></span>
                    </div>
                </div>
                <div class="transition-overlay"></div><!-- ends preloader -->
        <?php endif; ?>

        <!-- BIG WRAPPER BEGINS -->
        <main class="big-wrapper">
            <header class="azad-header header--fixed hide-from-print" style="background-color:<?php echo get_theme_mod( 'dh_bg', 'transparent' ); ?>;color:<?php echo get_theme_mod( 'hg_text_color', 'transparent'); ?>;">
                <div class="azad-container">
                    <div class="header-container">
                        <div class="logo-wrapper">

                            <?php if ( get_theme_mod( 'header_search_icon', true ) ) : ?>
                                <button class="toggle search-toggle responsive-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                    <span class="toggle-inner">
                                        <?php azad_the_svg( 'search' ); ?>
                                        <span class="toggle-text"><?php _e( 'Search', 'azad-guineapig' ); ?></span>
                                    </span>
                                </button>
                            <?php endif; ?>

                            <div class="logo">
                                <hgroup><?php azad_site_logo(); ?></hgroup>
                            </div>

                            <!-- RESPONSIVE TOGGLE BUTTON BEGINS -->
                            <button id="hamburger-menu" class="toggle nav-toggle responsive-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
								<!-- <div class="burger-button">
									<span></span>
                                </div> -->
                                <span class="toggle-inner">
                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                    <span class="toggle-text"><?php _e( 'Menu', 'azad-guineapig' ); ?></span>
                                </span>
                            </button><!-- ends responsive toggle button -->

                        </div>
                        <div class="azad-nav">
                            <nav class="desktop-menus">
                                <!-- THE WAY TO SHOW NAVIGATION -->
                                <?php								
                                    if ( function_exists( 'wp_nav_menu' ) ) {
                                        $defaults = array(
											'theme_location'  => 'desktop_horizontal',
                                            'menu'            => '',
                                            'container'       => 'div',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'nav navbar-nav',
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            // 'fallback_cb'     => 'wp_page_menu',
                                            'fallback_cb'     => 'azad_menu_fb',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'           => 0,
                                            'walker'          => ''
                                        );
                                        wp_nav_menu( $defaults );
                                    } else {
                                        echo "Pleas set the menu to display here...";
                                    }
                                ?>
                            </nav>
                            
                            <?php if ( get_theme_mod( 'header_search_icon', true ) || has_nav_menu( 'desktop_expanded' ) ) : ?>
                                <!-- ICON BUTTONS BEGIN -->
                                <div class="azad-search-button">
                                    <?php if ( has_nav_menu( 'desktop_expanded' ) ) : ?>
                                        <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Menu', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .nav-toggle -->
                                        </div><!-- .nav-toggle-wrapper -->

                                        <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".cart-modal" data-toggle-body-class="showing-cart-modal" aria-expanded="false" data-set-focus=".close-cart-toggle">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Cart', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .nav-toggle -->
                                        </div><!-- .nav-toggle-wrapper -->
										
										<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".cart-modal" data-toggle-body-class="showing-cart-modal" aria-expanded="false" data-set-focus=".close-cart-toggle">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'user' ); ?>
                                                    <span class="toggle-text"><?php _e( 'User', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .nav-toggle -->
                                        </div><!-- .nav-toggle-wrapper -->
										
										<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                                            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".cart-modal" data-toggle-body-class="showing-cart-modal" aria-expanded="false" data-set-focus=".close-cart-toggle">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'user' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Image', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .nav-toggle -->
                                        </div><!-- .nav-toggle-wrapper -->
                                    <?php endif; ?>
                                    <?php if ( get_theme_mod( 'header_search_icon', true ) ) : ?>
                                        <div class="toggle-wrapper search-toggle-wrapper">
                                            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                                <span class="toggle-inner">
                                                    <?php azad_the_svg( 'search' ); ?>
                                                    <span class="toggle-text"><?php _e( 'Search', 'azad-guineapig' ); ?></span>
                                                </span>
                                            </button><!-- .search-toggle -->
                                        </div>           
                                    <?php endif; ?>
                                </div><!-- ends icon buttons -->                           
                            <?php endif; ?>

                        </div><!-- ends azad-nav -->
                    </div><!-- ends header-container -->
                </div><!-- ends azad-container -->
            </header><!-- ends header -->

            <!-- RESPONSIVE SLIDER MENU BEGINS -->
            <nav class="mobile-menus">
                <!-- THE WAY TO SHOW NAVIGATION -->
                <?php 
                    // if ( function_exists('wp_nav_menu' ) ) {
                    //     if ( has_nav_menu( 'responsive_toggle' ) ) {
                    //         $defaults = array(
                    //             'theme_location'  => 'responsive_toggle',
                    //             'container'       => 'div',
                    //             'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    //             'show_toggles'   => true,
                    //         );
                    //         wp_nav_menu( $defaults );
                    //     } else {
                    //         echo '<ul><li><a href="">Pleas set the menu first</a><li></ul>';
                    //     }
                    // }
                ?>
                
            </nav><!-- ends responsive slider menu -->

            <?php

                // Output the search modal (if it is activated in the customizer).
                if ( get_theme_mod( 'header_search_icon', true ) ) {
                    get_template_part( 'template-parts/modal-search' );
                }
                
                // Output the menu modal.
                get_template_part( 'template-parts/modal-menu' );
                
                // Output the cart modal.
                get_template_part( 'template-parts/modal-cart' );
