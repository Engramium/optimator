<?php

namespace Engramium\Optimator\App;

use Engramium\Optimator\Dashboard\Settings;

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
        add_action('wp_ajax_optimator_update_quick_toggles', [$this, 'update_quick_toggles']);
        add_action('wp_ajax_optimator_get_quick_toggles', [$this, 'get_quick_toggles']);
    }

    public function check_nonce() {
        $status = check_ajax_referer('optimator_nonce', 'nonce');
        if (!$status) {
            wp_send_json_error([
                'message' => 'Unathorized Reqeust'
            ]);
        }
    }

    public function update_quick_toggles() {
        $this->check_nonce();
        $request = $_REQUEST;
        unset($request['action']);
        unset($request['nonce']);
        $quick_toggles = Settings::instance()->update_quick_toggles($request);
        wp_send_json_success($quick_toggles);
    }

    public function get_quick_toggles() {
        $this->check_nonce();
        wp_send_json_success(Settings::instance()->get_quick_toggles());
    }
}
