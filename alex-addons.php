<?php
/**
 * Plugin Name: Alex Addons
 * Description: Alex Addons is a custom edd addons.
 * Plugin URI:  https://alejandromerodio.com/
 * Version:     1.0.0
 * Author:      UnikForce IT
 * Author URI:  https://unikforce.com/
 * Text Domain: alex
 */

if (!defined('ABSPATH'))
    exit;

if (!class_exists('Alex_Addons')) {
    
    final class Alex_Addons
    {
        function __construct()
        {
            add_action( 'wp_enqueue_scripts', [$this, 'alex_enqueue_script'], 99 );
        }

        const VERSION = '1.0.0';

        /** Singleton *************************************************************/

        private static $instance;


        /**
         * Main Alex Addons Instance
         *
         * Insures that only one instance of Alex Addons exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         */
        public static function instance()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof Alex_Addons)) {

                self::$instance = new Alex_Addons;

                self::$instance->setup_constants();

                self::$instance->alex_includes();

            }
            return self::$instance;
        }

        public function alex_enqueue_script(){
            wp_enqueue_style('alex-main', ALEXADDONS_ASSETS_URL.'css/alex.css', '', ALEXADDONS_VERSION);
            //wp_enqueue_style('alex-bootstrap', ALEXADDONS_ASSETS_URL.'css/bootstrap.min.css', '', ALEXADDONS_VERSION);
            //wp_enqueue_script('alex-bootstraps', ALEXADDONS_ASSETS_URL.'js/bootstrap.bundle.min.js', ['jquery'], ALEXADDONS_VERSION);
            wp_enqueue_script('alex-main', ALEXADDONS_ASSETS_URL.'js/alex.js', ['jquery'], ALEXADDONS_VERSION);
        }

        /**
         * Setup plugin constants
         */
        private function setup_constants()
        {

            // Plugin Folder Path
            if (!defined('ALEXADDONS_DIR')) {
                define('ALEXADDONS_DIR', plugin_dir_path(__FILE__));
            }
            if (!defined('ALEXADDONS_DIRNAME')) {
                define('ALEXADDONS_DIRNAME', dirname(__FILE__) . '/');
            }
            // Plugin Folder Path
            if (!defined('ALEXADDONS_INC_DIR')) {
                define('ALEXADDONS_INC_DIR', plugin_dir_path(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('ALEXADDONS_URL')) {
                define('ALEXADDONS_URL', plugin_dir_url(__FILE__));
            }

            // Plugin Folder URL
            if (!defined('ALEXADDONS_ASSETS_URL')) {
                define('ALEXADDONS_ASSETS_URL', plugin_dir_url(__FILE__).'assets/');
            }
            if (!defined('ALEXADDONS_VERSION')) {
                define('ALEXADDONS_VERSION', self::VERSION);            }
        }

        private function alex_includes()
        {
            require_once ALEXADDONS_DIR . 'helper/helper-functions.php';
            if( ! function_exists( 'cs_framework_init' ) && ! class_exists( 'CSFramework' ) ) {
                require_once ALEXADDONS_DIR . 'vendor/framework/codestar-framework.php';
                require_once ALEXADDONS_DIR . 'include/admin-options.php';
            }
            require_once ALEXADDONS_DIR . 'edd/index.php';
        }
        
        

    }

} // End if class_exists check

function ALEXADDONS_INIT() {
    return Alex_Addons::instance();
}
remove_filter('the_content', 'edd_append_purchase_link', 9999);
remove_filter('edd_after_download_content', 'edd_append_purchase_link', 9999);
// Get SliderBuilderElementor Running
ALEXADDONS_INIT();