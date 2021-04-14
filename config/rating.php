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


];