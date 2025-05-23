<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters', 'acf', 'widgets'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Publicidad Sidebar', 'sage'),
        'id'            => 'sidebar-publicidad',
        'description'   => __('Widgets para publicidad en el sidebar', 'sage'),
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name'          => __('Sidebar Singles', 'sage'),
        'id'            => 'sidebar-singles',
        'description'   => __('Widgets para los artículos individuales (single)', 'sage'),
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
});


// add support for youtube oembed
require_once get_template_directory() . '/inc/acf/acf-field-multimedia.php';

// add support for podcast oembed
require_once get_template_directory() . '/inc/acf/acf-field-podcast.php';

/*
 * Enqueue scripts and styles.
 */
function theme_enqueue_video_assets() {
    // ✅ Solo ejecutar si estamos en la portada
    if (!is_front_page()) {
        return;
    }

    // JS
    wp_enqueue_script(
        'video-loader',
        get_template_directory_uri() . '/resources/js/video-loader.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'podcast-loader',
        get_template_directory_uri() . '/resources/js/podcast-loader.js',
        [],
        null,
        true
    );

    // CSS
    wp_enqueue_style(
        'multimedia-loader-css',
        get_template_directory_uri() . '/resources/css/multimedia-loader.css',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_video_assets');