<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('website.name') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP/Laravel che vogliono partecipare">
        <meta name="keywords" content="laravel, php, framework, web, meetup, verona">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Lato:400,300,700,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ elixir('assets/css/all.css') }}">
    </head>
    <body>
        <div class="overlay"></div>

        <div id="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('logo')
                        <h1 class="title">Laravel Meetup Verona</h1>
                        <h2 class="subtitle">14 novembre 2015</h2>

                        <div class="row">
                            <div class="info col-md-8 col-md-offset-2">
                                <p>Il Laravel Meetup Verona è un'occasione di incontro e discussione per tutti gli sviluppatori o appassionati di PHP/Laravel che vogliono partecipare.</p>
                                <p>L'idea è di incontrarci, conoscerci, fare amicizia e scambiare informazioni, problematiche, condividere soluzioni e strumenti di sviluppo basandoci sulle nostre esperienze.</p>
                                <p>Non importa quale sia il tuo livello di conoscenza di PHP o Laravel, sarai il benvenuto!</p>
                            </div>
                        </div>

                        <div id="countdown" class="clearfix">
                            <div id="countdown-days" class="countdown-partial"></div>
                            <div id="countdown-hours" class="countdown-partial"></div>
                            <div id="countdown-minutes" class="countdown-partial"></div>
                            <div id="countdown-seconds" class="countdown-partial"></div>
                        </div>

                        <a class="btn btn-lg btn-laravel" target="_blank" href="http://www.meetup.com/it/laravel-verona/">SCOPRI I DETTAGLI DEL MEETUP</a>
                    </div>
                </div>

                <footer class="row">
                    <div class="col-md-12">

                    </div>
                </footer>
            </div>
        </div>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-8557461-13', 'auto');
            ga('send', 'pageview');
        </script>

        @include('javascript')

        <script src="{{ elixir('assets/js/all.js') }}"></script>
    </body>
</html>
