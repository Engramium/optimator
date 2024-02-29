<?php

namespace Engramium\Optimator\App\QuickToggle;

use Engramium\Optimator\Dashboard\Settings;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Application base class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class GeneralManager {

    use \Engramium\Optimator\Traits\Singleton;

    public $generals;

    public function init() {
        $settings = Settings::instance()->get_quick_toggles();
        $this->generals = isset($settings['generals']) ? $settings['generals'] : [];
        add_action('init', [$this, 'disable_emojis']);
        add_action('init', [$this, 'disable_embeds'], PHP_INT_MAX);
        add_action('wp_enqueue_scripts', [$this, 'disable_dashicons']);
        $this->disable_xml_rpc();
        add_filter('wp_default_scripts', [$this, 'remove_jquery_migrate']);
        $this->hide_wp_version();
        $this->remove_wlwmanifest_link();
        $this->remove_rsd_link();
    }

    public function disable_emojis() {
        if (is_bool($this->generals['disable_emojis']) && $this->generals['disable_emojis']) {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('tiny_mce_plugins', [$this, 'disable_emojis_tinymce']);
            add_filter('emoji_svg_url', '__return_false');
        }
    }

    public function disable_emojis_tinymce($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

    public function disable_embeds() {
        if (is_bool($this->generals['disable_emojis']) && $this->generals['disable_emojis']) {
            global $wp;
            $wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
            add_filter('embed_oembed_discover', '__return_false');
            remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
            remove_action('wp_head', 'wp_oembed_add_discovery_links');
            remove_action('wp_head', 'wp_oembed_add_host_js');
            add_filter('tiny_mce_plugins', [$this, 'disable_embeds_tiny_mce_plugin']);
            add_filter('rewrite_rules_array', [$this, 'disable_embeds_rewrites']);
            remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
        }
    }

    function disable_embeds_tiny_mce_plugin($plugins) {
        return array_diff($plugins, array('wpembed'));
    }

    function disable_embeds_rewrites($rules) {
        foreach ($rules as $rule => $rewrite) {
            if (is_string($rewrite) && false !== strpos($rewrite, 'embed=true')) {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }

    public function disable_dashicons() {
        if (is_bool($this->generals['disable_dashicons']) && $this->generals['disable_dashicons']) {
            if (!is_user_logged_in()) {
                wp_dequeue_style('dashicons');
                wp_deregister_style('dashicons');
            }
        }
    }

    public function disable_xml_rpc() {
        if (is_bool($this->generals['disable_xml_rpc']) && $this->generals['disable_xml_rpc']) {
            add_filter('xmlrpc_enabled', '__return_false');
            add_filter('wp_headers', [$this, 'remove_x_pingback']);
            add_filter('pings_open', '__return_false', 9999);
            add_filter('pre_update_option_enable_xmlrpc', '__return_false');
            add_filter('pre_option_enable_xmlrpc', '__return_zero');
            add_filter('optimator_output_buffer_template_redirect', [$this, 'remove_pingback_links'], 2);
            add_action('init', [$this, 'intercept_xmlrpc_header']);
        }
    }

    public function remove_x_pingback($headers) {
        unset($headers['X-Pingback'], $headers['x-pingback']);
        return $headers;
    }

    public function remove_pingback_links($html) {
        preg_match_all('#<link[^>]+rel=["\']pingback["\'][^>]+?\/?>#is', $html, $links, PREG_SET_ORDER);
        if (!empty($links)) {
            foreach ($links as $link) {
                $html = str_replace($link[0], "", $html);
            }
        }
        return $html;
    }

    public function intercept_xmlrpc_header() {
        if (!isset($_SERVER['SCRIPT_FILENAME'])) {
            return;
        }

        //direct requests only
        if ('xmlrpc.php' !== basename($_SERVER['SCRIPT_FILENAME'])) {
            return;
        }

        $header = 'HTTP/1.1 403 Forbidden';
        header($header);
        echo $header;
        die();
    }

    public function remove_jquery_migrate(&$scripts) {
        if (!is_admin()) {
            $scripts->remove('jquery');
            $scripts->add('jquery', false, array('jquery-core'), '1.12.4');
        }
    }

    public function hide_wp_version() {
        if (is_bool($this->generals['hide_wp_version']) && $this->generals['hide_wp_version']) {
            remove_action('wp_head', 'wp_generator');
            add_filter('the_generator', [$this, 'optimator_hide_wp_version']);
        }
    }

    public function optimator_hide_wp_version() {
        return '';
    }

    public function remove_wlwmanifest_link() {
        if (is_bool($this->generals['remove_wlwmanifest_link']) && $this->generals['remove_wlwmanifest_link']) {
            remove_action('wp_head', 'wlwmanifest_link');
        }
    }

    public function remove_rsd_link() {
        if (is_bool($this->generals['remove_rsd_link']) && $this->generals['remove_rsd_link']) {
            remove_action('wp_head', 'rsd_link');
        }
    }
}
