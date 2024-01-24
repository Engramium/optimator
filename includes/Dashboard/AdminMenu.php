<?php

namespace Engramium\Optimator\Dashboard;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Add dashboard menu class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class AdminMenu {

    use \Engramium\Optimator\Traits\Singleton;

    /**
     * initialization function
     *
     * @return void
     * @since 1.0.0
     */
    public function init() {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * add admin menu function
     *
     * @return void
     * @since 1.0.0
     */
    public function admin_menu() {
        $capability = 'manage_options';
        $slug       = 'optimator-settings';

        add_menu_page(
            __('Optimator', 'optimator'),
            __('Optimator', 'optimator'),
            $capability,
            $slug,
            [$this, 'render_page'],
            'dashicons-text',
            30
        );
    }

    /**
     * render html in menu function
     *
     * @return void
     * @since 1.0.0
     */
    public function render_page() {
        echo '<div class="wrap"><div id="optimator-dashboard-app"></div></div>';
    }
}
