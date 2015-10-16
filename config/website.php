<?php

use Jenssegers\Date\Date;

return [
    'name' => 'Laravel Meetup Verona',

    'group' => [
        'url' => 'http://www.meetup.com/it/laravel-verona/',
    ],

    'event' => [
        'name'  => '1° Laravel Meetup Verona',
        'start' => Date::create(2015, 11, 14, 15, 30),
        'end'   => Date::create(2015, 11, 14, 18, 00),
        'url'   => 'http://www.meetup.com/it/laravel-verona/events/225956895/',
    ],

    'facebook' => [
        'url' => 'https://www.facebook.com/groups/laravelverona/',
    ],
];
