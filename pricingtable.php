<?php
/*
Plugin Name: Pricing Table by PickPlugins
Plugin URI: https://www.pickplugins.com/item/pricing-table/?ref=dashboard
Description: Long waited pricing table plugin for WordPress published to display pricing grid on your WordPress site.
Version: 1.12.9
Author: pickplugins
Author URI: http://pickplugins.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access	


if(!class_exists('PricingTablePickplugins')){
    class PricingTablePickplugins{

        public function __construct(){

            define('pricingtable_plugin_url', plugins_url('/', __FILE__)  );
            define('pricingtable_plugin_dir', plugin_dir_path( __FILE__ ) );

            define('pricingtable_pro_url','https://www.pickplugins.com/item/pricing-table/?ref=dashboard' );
            define('pricingtable_plugin_name', 'Pricing Table' );
            define('pricingtable_version', '1.12.9' );

            //require_once( pricingtable_plugin_dir . 'includes/meta.php');
            require_once( pricingtable_plugin_dir . 'includes/functions.php');
            require_once( pricingtable_plugin_dir . 'includes/class-functions.php');
            require_once( pricingtable_plugin_dir . 'includes/class-shortcodes.php');

            require_once( pricingtable_plugin_dir . 'includes/class-post-types.php');
            require_once( pricingtable_plugin_dir . 'includes/class-settings-tabs.php');
            require_once( pricingtable_plugin_dir . 'includes/class-post-meta-pricingtable.php');
            require_once( pricingtable_plugin_dir . 'includes/class-post-meta-pricingtable-hook.php');



            add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

        }





        public function front_scripts(){

            wp_register_style('pricingtable_style', pricingtable_plugin_url.'assets/front/css/pricingtable.css');
            wp_register_style('owl.carousel', pricingtable_plugin_url.'assets/front/css/owl.carousel.min.css');
            wp_register_script('owl.carousel', pricingtable_plugin_url. 'assets/front/js/owl.carousel.min.js' , array( 'jquery' ));

        }


        public function admin_scripts(){

            $screen = get_current_screen();

            //var_dump($screen);

            wp_register_style('pricingtable_style', pricingtable_plugin_url.'assets/front/css/pricingtable.css');

            wp_register_script('settings-tabs', pricingtable_plugin_url. 'assets/settings-tabs/settings-tabs.js' , array( 'jquery' ));
            wp_register_style('settings-tabs', pricingtable_plugin_url.'assets/settings-tabs/settings-tabs.css');

            wp_register_style('font-awesome-5', pricingtable_plugin_url.'assets/global/css/font-awesome-5.css');
            wp_register_style('font-awesome-4', pricingtable_plugin_url.'assets/global/css/font-awesome-4.css');

            wp_register_script('metabox-pricingtable', pricingtable_plugin_url. 'assets/admin/js/metabox-pricingtable.js' , array( 'jquery' ));
            wp_register_style('metabox-pricingtable', pricingtable_plugin_url.'assets/admin/css/metabox-pricingtable.css');

            if ($screen->id == 'pricingtable'){

                $pickp_settings_tabs_field = new pickp_settings_tabs_field();
                $pickp_settings_tabs_field->admin_scripts();

                wp_enqueue_script( 'scripts-meta-pricingtable' );
                wp_enqueue_style( 'metabox-pricingtable' );
                wp_enqueue_script( 'metabox-pricingtable' );
                wp_enqueue_style( 'pricingtable_style' );

            }


        }






    }
}

new PricingTablePickplugins();