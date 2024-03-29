<?php
/**
*--------------------------
* :: @package azad-x
* :: @version 1.0.0
*--------------------------
*/
namespace Azad_Guineapig;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH') || exit;

if ( ! class_exists( 'Enqueue' ) ) :

    class Enqueue {
        public static $_instance = null;
        public function __construct() {
            add_action( 'wp_enqueue_scripts', array( $this, 'azad_enqueue_scripts' ) );
        }

        public static function demo() {}
        
        public function azad_enqueue_scripts() {
            // LOAD STYLESHEETS
            wp_register_style(
                'main',
                trailingslashit( get_template_directory_uri() ) . 'assets/css/main-style.min.css',
                array(),
                AZPIG_VERSION,
                'all'
            );
            wp_enqueue_style( 'main' );
            
            wp_register_style(
                'headroom',
                trailingslashit( get_template_directory_uri() ) . 'assets/css/headroom.css',
                array(),
                AZPIG_VERSION,
                'all'
            );
            //wp_enqueue_style( 'headroom' );

            // LOAD JAVASCRIPTS
            wp_register_script(
                'headroom',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/headroom.min.js',
                array( 'jquery' ),
                AZPIG_VERSION,
                true
            );
            //wp_enqueue_script( 'headroom' );
            
            wp_register_script(
                'toggles',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/toggles.min.js',
                array( 'jquery' ),
                AZPIG_VERSION,
                true
            );
            wp_enqueue_script( 'toggles' );
            
            wp_register_script(
                'isotope',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/isotope.pkgd.min.js',
                array( 'jquery' ),
                AZPIG_VERSION,
                true
            );
            wp_enqueue_script( 'isotope' );

            wp_register_script(
                'activation',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/activation.min.js',
                array( 'jquery', 'isotope' ),
                AZPIG_VERSION,
                true
            );
            wp_enqueue_script( 'activation' );            
        }

        public static function get_instance() {
            if ( is_null( self::$_instance ) && ! isset( self::$_instance ) && ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();            
            }
            return self::$_instance;
        }

        public function __destruct() {}

    }

endif;

if ( ! function_exists( 'load_azad_enqueue' ) ) {
    function load_azad_enqueue() {
        return Enqueue::get_instance();
    }
}
//$GLOBALS['enqueue'] = load_azad_enqueue();