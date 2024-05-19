<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify the base uri for each service.
    |
    |
    |
    */

    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'text' => '',
            'image'=>''

        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => 'Default share text',
            'image'=>''
        ],
        'linkedin' => [
            'uri' => 'https://www.linkedin.com/sharing/share-offsite', // oud: http://www.linkedin.com/shareArticle
            'extra' => ['mini' => 'true'],
            'text' => '',
            'image'=>''
        ],
        'whatsapp' => [
            'uri' => 'https://wa.me/?text=',
            'extra' => ['mini' => 'true'],
            'text' => '',
            'image'=>''
        ],
        'pinterest' => [
            'uri' => 'https://pinterest.com/pin/create/button/?url=',
            'text' => '',
            'image'=>''
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit',
            'text' => '',
            'image'=>''
        ],
        'telegram' => [
            'uri' => 'https://telegram.me/share/url',
            'text' => '',
            'image'=>''
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Font Awesome
    |--------------------------------------------------------------------------
    |
    | Specify the version of Font Awesome that you want to use.
    | We support version 4 and 5.
    |
    |
    */

    'fontAwesomeVersion' => 5,
];
