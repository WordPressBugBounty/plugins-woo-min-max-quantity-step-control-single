<?php
/**
 * WC_MMQ Framework - Plugin Required Handler
 *
 * Checks if required plugins (WooCommerce) are active.
 * Used by the main plugin to gate functionality.
 *
 * @package WC_MMQ_Framework
 * @version 1.0.0
 */

namespace WC_MMQ\Framework;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WC_MMQ_BASE_DIR . 'framework/framework.php';

if ( ! class_exists( __NAMESPACE__ . '\Plugin_Required' ) ) {

    /**
     * Plugin Required Check
     */
    class Plugin_Required {

        /**
         * Check if required plugins are missing.
         *
         * @return bool True if requirements are NOT met (fail).
         */
        public static function fail() {
            // WooCommerce is required
            if ( ! class_exists( 'WooCommerce' ) ) {
                $framework = \CA_Framework::init( 'woo-min-max-quantity-step-control-single', WC_MMQ__FILE__ );

                $framework->required_plugins( array(
                    array(
                        'name'        => 'WooCommerce',
                        'slug'        => 'woocommerce',
                        'path'        => 'woocommerce/woocommerce.php',
                        'description' => 'WooCommerce is required to use this plugin. Please install and activate WooCommerce.',
                        'icon'        => 'https://ps.w.org/woocommerce/assets/icon.svg?rev=3234504',
                    ),
                ) )->show();

                return true;
            }

            return false;
        }
    }
}