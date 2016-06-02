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
        'client_id' => '884334668360188',
        'client_secret' => 'baf56a18e8f5a0e009a4d30da1b859ef',
        'redirect' => 'http://lakshmiprasanna.karmanya.dev/facebook/callback/',
    ],
    'google' => [
        'client_id' => '973828635385-ha0s2h94penlvc98a8vgs47imgb2kg22.apps.googleusercontent.com',
        'client_secret' => 'eEdduC17CA1fAsl4a16bGWTZ',
        'redirect' => 'http://lakshmiprasanna.karmanya.dev/google/callback',
    ],
     'linkedin' => [
        'client_id' => '75torlfn2n2qsx',
        'client_secret' => 'Y1sDezleaGCb5j5s',
        'redirect' => 'http://lakshmiprasanna.karmanya.dev/linkedin/callback',
    ],
];
