<?php

namespace Engramium\Optimator\App;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Ajax Handler class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class AjaxHandler {

    use \Engramium\Optimator\Traits\Singleton;

    /**
     * initialization function
     *
     * @return void
     * @since 1.0.0
     */
    public function init() {
        add_action('wp_ajax_quick_toggle_update', [$this, 'quick_toggle_update']);
    }

    public function check_nonce() {
        $status = check_ajax_referer('optimator_nonce', 'nonce');
        if (!$status) {
            wp_die('Unathorized Reqeust');
        }
    }

    public function quick_toggle_update() {
        $this->check_nonce();
        wp_send_json_success($_REQUEST);
    }
}
