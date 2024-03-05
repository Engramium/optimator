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
class MediaManager {

    use \Engramium\Optimator\Traits\Singleton;

    public $medias;

    public function init() {
        $settings = Settings::instance()->get_quick_toggles();
        $this->medias = isset($settings['medias']) ? $settings['medias'] : [];
        add_filter('intermediate_image_sizes_advanced', [$this, 'remove_default_images']);
    }

    public function remove_default_images($sizes) {
        if (is_bool($this->medias['disable_thumbnail']) && $this->medias['disable_thumbnail']) {
            unset($sizes['small']); // 150px
        }
        if (is_bool($this->medias['disable_medium']) && $this->medias['disable_medium']) {
            unset($sizes['medium']); // 300px
        }
        if (is_bool($this->medias['disable_medium_large']) && $this->medias['disable_medium_large']) {
            unset($sizes['medium_large']); // 768px
        }
        if (is_bool($this->medias['disable_large']) && $this->medias['disable_large']) {
            unset($sizes['large']); // 1024px
        }
        return $sizes;
    }
}