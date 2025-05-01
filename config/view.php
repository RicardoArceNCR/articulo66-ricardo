<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        get_theme_file_path('/resources/views'),
    ],


    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the uploads
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => wp_upload_dir()['basedir'] . '/cache',

    /*
    |--------------------------------------------------------------------------
    | View Composers
    |--------------------------------------------------------------------------
    |
    | Here you may define the view composers for your application. These
    | composers can be used to bind data to your views whenever they
    | are loaded. We have included some common examples for you.
    |
    */

    'composers' => [
        App\Composers\App::class,
        App\Composers\SwipeAssets::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | View Directives
    |--------------------------------------------------------------------------
    |
    | The namespaces where view components reside. Components can be referenced
    | with camelCase notation prefixed with an x. Examples: `<x-alert>`,
    | `<x-user-profile>`, `<x-sidebar.link>`, `<x-form.button>`.
    |
    */

    'directives' => [
        // @asset($path)
        'asset' => function ($expression) {
            return "<?php echo App\asset_path({$expression}); ?>";
        },
    ],
]; 