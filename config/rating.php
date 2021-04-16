<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Rating Micro Service Credentials
     |--------------------------------------------------------------------------
     |
     | Inorder to be immune from the artisan cache:clear command
     | temp-tag has its own storage path to store expiring data.
     |
     |
     */
    'uri' => env('RATING_MICROSERVICE_URI', ''),

    'username' => env('RATING_MICROSERVICE_USERNAME', ''),

    'password' => env('RATING_MICROSERVICE_PASSWORD', ''),



    /*
     * Settings for `laravel` type output.
     */
    'routes' => [
        /*
         * Whether to automatically create a docs endpoint for you to view your generated docs.
         * If this is false, you can still set up routing manually.
         */
        'add_routes' => true,

        /*
         * URL path to use for the docs endpoint (if `add_routes` is true).
         * By default, `/rating/status` is for geting rate status and `ratng/submit` is for rate and submit feedback in microservice.
         */
        'prefix_url' => '',

        /*
         * Middleware to attach to the docs endpoint (if `add_routes` is true).
         */
        'middleware' => '',
    ],

];
