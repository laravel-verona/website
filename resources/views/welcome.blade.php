<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('website.name') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="{{ config('website.description') }}">
        <meta name="keywords" content="laravel, php, framework, web, meetup, verona">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Open Graph -->
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ config('website.name') }}" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta property="og:description" content="{{ config('website.description') }}" />
        <meta property="og:image" content="{{ asset('build/assets/images/preview.jpg') }}" />
        <meta property="og:image:width" content="750" />
        <meta property="og:image:height" content="389" />
        <meta property="og:locale" content="it_IT" />
        <meta name="twitter:image" content="{{ asset('build/assets/images/preview.jpg') }}" />
        <meta name="twitter:card" content="summary_large_image" />

        <!-- Rich Snippet -->
        @include('partials.event-snippet')

        <!-- Styles -->
        <!--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,300,700,900">-->
        <link href="http://fonts.googleapis.com/css?family=Raleway:200,300,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/all.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-dark navbar-lmv navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">{{ config('website.name') }}</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="#notes">Notes</a>
                        </li>
                        <li>
                            <a href="#notes">Staff</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="header">
            <div class="overlay"></div>

            <div class="title-cont">
                @include('partials.logo')

                <h1 class="title">{{ config('website.event.name') }}</h1>
                <h2 class="subtitle">{{ config('website.event.start')->format('j F Y') }}</h2>
            </div>
        </header>

        <div id="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="info col-md-8 col-md-offset-2">
                                <h1>Cosa stai aspettando ?</h1>

                                <p>Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP e Laravel che vogliono partecipare.</p>
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

                        <a class="btn btn-lg btn-lmv" target="_blank" href="{{ config('website.group.url') }}">PARTECIPA AL MEETUP</a>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container text-center">
                &copy {{ date('Y') }} Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.

                <br /><br />

                <a target="_blank" class="social-icon" href="{{ config('website.facebook.url') }}">
                    <i class="fa fa-facebook-official"></i>
                </a>

                <a target="_blank" class="social-icon" href="#">
                    <i class="fa fa-github"></i>
                </a>
            </div>
        </footer>

        @include('partials.javascript')
        <script src="{{ elixir('assets/js/all.js') }}"></script>
    </body>
</html>
