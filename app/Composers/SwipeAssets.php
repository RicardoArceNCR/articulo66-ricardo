<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class SwipeAssets extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.principales',
        'sections.destacados'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
        
        return [];
    }

    /**
     * Enqueue Swiper assets.
     *
     * @return void
     */
    public function enqueueAssets()
    {
        // Enqueue Swiper CSS
        wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        
        // Enqueue Swiper JS
        wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        
        // Add inline script to dispatch event when Swiper is loaded
        wp_add_inline_script('swiper', '
            console.log("💫 Swiper script loaded, dispatching event...");
            window.addEventListener("load", function() {
                if (typeof Swiper !== "undefined") {
                    console.log("🎯 Swiper object found, dispatching event");
                    document.dispatchEvent(new Event("swiper:loaded"));
                } else {
                    console.error("⚠️ Swiper object not found after load");
                }
            });
        ');
        
        // Enqueue our slider initialization script
        wp_enqueue_script(
            'principales-slider', 
            asset('scripts/principales-slider.js')->uri(), 
            ['swiper'], 
            null, 
            true
        );
    }
} 