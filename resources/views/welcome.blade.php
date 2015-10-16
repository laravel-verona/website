<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('website.name') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP/Laravel che vogliono partecipare">
        <meta name="keywords" content="laravel, php, framework, web, meetup, verona">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,300,700,900">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/all.css') }}">

        @include('partials.event-snippet')
    </head>
    <body>
        <div class="overlay"></div>

        <div id="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('partials.logo')
                        <h1 class="title">{{ config('website.name') }}</h1>
                        <h2 class="subtitle">{{ config('website.event.start')->format('j F Y') }}</h2>

                        <div class="row">
                            <div class="info col-md-8 col-md-offset-2">
                                <p>Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP/Laravel che vogliono partecipare.</p>
                                <p>L'idea è di incontrarci, conoscerci, fare amicizia e scambiare informazioni, problematiche, condividere soluzioni e strumenti di sviluppo basandoci sulle nostre esperienze. Non importa quale sia il tuo livello di conoscenza di PHP o Laravel, sarai il benvenuto!</p>

                                <p class="event-reminder">
                                    Ti aspettiamo {{ config('website.event.start')->format('l j F') }}, dalle {{ config('website.event.start')->format('H:i') }} alle {{ config('website.event.end')->format('H:i') }}, al {{ config('website.event.name') }}
                                </p>
                            </div>
                        </div>

                        <div id="countdown" class="clearfix">
                            <div id="countdown-days" class="countdown-partial"></div>
                            <div id="countdown-hours" class="countdown-partial"></div>
                            <div id="countdown-minutes" class="countdown-partial"></div>
                            <div id="countdown-seconds" class="countdown-partial"></div>
                        </div>

                        <a class="btn btn-lg btn-laravel" target="_blank" href="{{ config('website.group.url') }}">PARTECIPA AL MEETUP</a>
                    </div>
                </div>

                <footer class="row">
                    <div class="col-md-12">
                        <a target="_blank" class="social-icon" href="{{ config('website.facebook.url') }}">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                    </div>
                </footer>
            </div>
        </div>

        @include('partials.javascript')
        <script src="{{ elixir('assets/js/all.js') }}"></script>
    </body>
</html>
