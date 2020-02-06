<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => '453115895623182',
        'client_secret' => '2b64e86c7bd497075a24613c3cfbc095',
        'redirect'      =>'https://awnbank.com/login/facebook/callback',
    ],
    'twitter' => [
        'client_id'     => 'lWJVmJHOqWL37PWFqhsbmfO3R',
        'client_secret' => 'IxI6bk38UIzXqn1ZbkaG97KLmGQwPPJZWGHKUnagaIWLRi4lSW',
        'redirect'      =>'https://awnbank.com/login/twitter/callback',
    ],
    'instagram' => [
        'client_id'     => '847538222347716',
        'client_secret' => 'a45b32ad40c54a18d59c0de49ab716af',
        'redirect'      =>'https://awnbank.com/login/instagram/callback',
    ],
    'google' => [
        'client_id'     => '37041590134-8r9g0l3j93ib6kp5r3vg990a8tj6bfeo.apps.googleusercontent.com',
        'client_secret' => 'ybBJrjDzZnVpVqhqAF72PQOi',
        'redirect'      =>'https://awnbank.com/login/google/callback',
    ],

];
