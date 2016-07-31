<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sandbox86bbc098e2e343af8cc523d773531cdf.mailgun.org',
        'secret' => 'key-42cbc9c0e4b1bc4462b1f885fa0f883e',
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
        'client_id' => '1701245933494823',
        'client_secret' => '19f1cf074410de377868014e5ab9af2e',
        'redirect' => 'http://localhost/evoneur/evoneur/public/handle_facebook',
    ],
    'linkedin' => [
        'client_id' => '1701245933494823',
        'client_secret' => '19f1cf074410de377868014e5ab9af2e',
        'redirect' => 'http://localhost/evoneur/evoneur/public/handle_linkedin',
    ],
];
