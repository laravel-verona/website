<?php

use Jenssegers\Date\Date;

return [
    'event' => [
        'name'  => '2° Laravel Meetup Verona',
        'start' => Date::create(2015, 12, 12, 14, 30),
        'end'   => Date::create(2015, 12, 12, 18, 00),
        'url'   => 'http://www.meetup.com/it/laravel-verona/events/226778039/',
        'venue' => [
            'name'      => 'Vecomp SpA',
            'address'   => 'Via Alberto Dominutti 2, Verona (VR)',
            'map_url'   => 'https://www.google.com/maps/place/Vecomp+Spa/@45.425705,10.9899023,17z/data=!3m1!4b1!4m2!3m1!1s0x477f5f6c87a4be47:0x3a22caa205f01023?hl=it',
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.188321532497!2d10.98990231555617!3d45.42570497910054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477f5f6c87a4be47%3A0x3a22caa205f01023!2sVecomp+Spa!5e0!3m2!1sit!2sus!4v1447776487295',
        ],
    ],

    'social' => [
        'github'   => 'https://github.com/laravel-verona',
        'meetup'   => 'http://www.meetup.com/it/laravel-verona/',
        'facebook' => 'https://www.facebook.com/laravel.verona/',
    ],

    'annotations' => [
        'path'       => storage_path('app/annotations'),
        'blob'       => 'https://github.com/laravel-verona/annotations/blob/master',
        'commit'     => 'https://github.com/laravel-verona/annotations/commit',
        'repository' => 'https://github.com/laravel-verona/annotations.git',
    ],
];
