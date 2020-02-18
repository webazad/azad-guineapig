<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
* :: TO REGISTER WIDGETS IN SIDEBARS OR IN FOOTER OR ANYWHERE IN THE PAGE 
*-----------------------------------------------------------------------------
*/
namespace Inc\Admin;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Azad_Widgets' ) ):
    class Azad_Widgets{
        public static $_instance = null;
        public function __construct() {
            add_action('widgets_init',array($this,'azad_register_widget'));
            add_action('widgets_init',array($this,'azad_register_widgets'));
        }
        public function azad_register_widgets(){
            $widgets = array(
                array(
                    'name'=>'Slider Menu Widget',
                    'id'=>'slider_menu_widget',
                    'description'=>'Widget for slider menu'
                ),
                array(
                    'name'=>'Search Result Sidebar',
                    'id'=>'search_result_sidebar',
                    'description'=>'Widget for search result sidebar'
                ),
                array(
                    'name'=>'Left Sidebar',
                    'id'=>'left_sidebar',
                    'description'=>'Widget for the left sidebar'
                ),
                array(
                    'name'=>'Right Sidebar',
                    'id'=>'right_sidebar',
                    'description'=>'Widget for the right sidebar'
                ),
                array(
                    'name'=>'Footer Widget One',
                    'id'=>'footer_widget_one',
                    'description'=>'Widget for footer one'
                ),
                array(
                    'name'=>'Footer Widget Two',
                    'id'=>'footer_widget_two',
                    'description'=>'Widget for footer two'
                ),
                array(
                    'name'=>'Footer Widget Three',
                    'id'=>'footer_widget_three',
                    'description'=>'Widget for footer three'                    
                ),
                array(
                    'name'=>'Footer Widget Four',
                    'id'=>'footer_widget_four',
                    'description'=>'Widget for footer four'
                )
                
            );
            foreach($widgets as $widget){
                $this->get_azad_register_widgets($widget['name'],$widget['id'],$widget['description']);    
            }            
        }
        public static function get_azad_register_widgets($name, $id, $description){
            if (function_exists('register_sidebar')) {
                register_sidebar(array(
                    'name' => esc_html($name,'azad'),
                    'id'   => $id,
                    'description'   => esc_html($description,'azad'),
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h3>',
                    'after_title'   => '</h3>'
                ));
            }
        }
        public static function azad_register_widget(){
            if (function_exists('register_sidebar')) {
                register_sidebar(array(
                    'name' => 'Default Sidebar',
                    'id'   => 'default_sidebar',
                    'description'   => 'Widget for default sidebar.',
                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h3>',
                    'after_title'   => '</h3>'
                ));
            }
        }
        public static function register() {
            //echo 'Register';   
        }
        public static function get_instance(){
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
        public function __destruct() {}
     }
endif;

if(! function_exists('load_azad_widgets')){
    function load_azad_widgets(){
        return Azad_Widgets::get_instance();
    }
}
//$GLOBALS['widgets'] = load_azad_widgets();