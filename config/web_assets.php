<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    */
    'layouts' => [
        'main' => 'layouts.web_layout.main',
    ],

    /*
    |--------------------------------------------------------------------------
    | Partials
    |--------------------------------------------------------------------------
    */
    'partials' => [
        'header' => 'partials.web_partial.header',
        'footer' => 'partials.web_partial.footer',
    ],

    /*
    |--------------------------------------------------------------------------
    | Vendor Fonts & CDN
    |--------------------------------------------------------------------------
    */
    'vendor' => [
        'tailwind'       => 'https://cdn.tailwindcss.com',
        'google_fonts'   => 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        'fontawesome'    => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Common CSS (used on all pages)
    |--------------------------------------------------------------------------
    */
    'common_css' => [
        'web_assets/css/navbar.css',
        'web_assets/css/web.css',
        'web_assets/css/model-box.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Common JS (used on all pages)
    |--------------------------------------------------------------------------
    */
    'common_js' => [
        'web_assets/js/navbar.js',
        'web_assets/js/proposal.js',
        'web_assets/js/form_and_model_box.js',
    ],

];
