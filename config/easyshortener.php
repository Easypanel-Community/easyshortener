<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | Here is where you can turn on/off authentication areas
    |
    */
    
    'registration' => env('EASYSHORTENER_ALLOW_REGISTRATION', true),
    
    /*
    |--------------------------------------------------------------------------
    | Shortening
    |--------------------------------------------------------------------------
    |
    | Here is where you can turn on/off URL shortening features
    |
    */
    
    'enable_analytics' => env('EASYSHORTENER_ALLOW_ANALYTICS', true),
    
    /*
    |--------------------------------------------------------------------------
    | System
    |--------------------------------------------------------------------------
    |
    | Here is where you can find system variables
    |
    */
    
    'version' => '1.1.2',
    
];
