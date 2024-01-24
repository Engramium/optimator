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

    private $slug = 'optimator-settings';

    /**
     * initialization function
     *
     * @return void
     * @since 1.0.0
     */
    public function init() {
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('in_admin_header', [$this, 'remove_all_notices'], PHP_INT_MAX);
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
            $this->slug,
            [$this, 'render_page'],
            OPTIMATOR_URL . 'public/img/menu-icon-default.png',
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

    /**
     * remove all notices from menu function
     *
     * @return void
     * @since 1.0.0
     */
    public function remove_all_notices() {
        if (!$this->is_page()) return;
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');
        remove_all_actions('user_admin_notices');
    }

    /**
     * is menu page check function
     *
     * @return boolean
     * @since 1.0.0
     */
    public function is_page() {
        return (isset($_GET['page']) && (sanitize_text_field($_GET['page']) === $this->slug));
    }
}
