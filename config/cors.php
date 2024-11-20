<?php
return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS Configuration
     |--------------------------------------------------------------------------
     |
     | Configure how your application handles Cross-Origin Resource Sharing (CORS).
     | These settings determine what cross-origin operations are allowed.
     |
     */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];