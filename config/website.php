<?php

use Jenssegers\Date\Date;

return [
    'name'        => 'Laravel Meetup Verona',
    'preview'     => 'build/assets/images/preview.jpg',
    'description' => "Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP/Laravel che vogliono partecipare",

    'group' => [
        'url' => 'http://www.meetup.com/it/laravel-verona/',
    ],

    'event' => [
        'name'  => '2° Laravel Meetup Verona',
        'start' => Date::create(2015, 12, 12, 14, 30),
        'end'   => Date::create(2015, 12, 12, 18, 00),
        'url'   => 'http://www.meetup.com/it/laravel-verona/events/226778039/',
        'venue' => [
            'name'    => 'Vecomp SpA',
            'address' => 'Via Alberto Dominutti 2, Verona (VR)',
            'map_url' => 'https://www.google.com/maps/place/Vecomp+Spa/@45.425705,10.9899023,17z/data=!3m1!4b1!4m2!3m1!1s0x477f5f6c87a4be47:0x3a22caa205f01023?hl=it',
        ],
    ],

    'social' => [
        'github'   => 'https://github.com/laravel-verona',
        'facebook' => 'https://www.facebook.com/laravel.verona/',
    ],
];
