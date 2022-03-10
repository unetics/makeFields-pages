<?php
    if (defined('ABSPATH')) {

        if (!function_exists('mb_settings_page_load')) {
            /**
             * Hook to 'init' with priority 5 to make sure all actions are registered before Meta Box 4.9.0 runs
             */
            add_action('init', 'mb_settings_page_load', 5);

            /**
             * Load plugin files after Meta Box is loaded
             */
            function mb_settings_page_load()
            {
                if (!defined('RWMB_VER') || class_exists('MB_Settings_Page')) {
                    return;
                }

                require dirname(__FILE__) . '/inc/class-mb-settings-page.php';
                require dirname(__FILE__) . '/inc/class-mb-settings-page-meta-box.php';
                require dirname(__FILE__) . '/inc/class-mb-settings-page-loader.php';
                require dirname(__FILE__) . '/inc/class-rwmb-setting-storage.php';
                $loader = new MB_Settings_Page_Loader();
                $loader->init();

                load_plugin_textdomain('mb-settings-page', FALSE, plugin_basename(dirname(__FILE__)) . '/languages/');
            }
        }
    }