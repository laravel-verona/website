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
    ],

    'facebook' => [
        'url' => 'https://www.facebook.com/laravel.verona/',
    ],
];
