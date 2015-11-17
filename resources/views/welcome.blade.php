@extends('layout')

@section('content')
<header class="header text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        @include('partials.logo')

        <h1 class="title animated slideInUp">{{ config('website.event.name') }}</h1>
        <h2 class="subtitle animated flipInX">{{ config('website.event.start')->format('j F Y') }}</h2>
    </div>
</header>

<div id="wrapper" class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="info col-md-8 col-md-offset-2">
                        <h1>Unisciti a noi !</h1>

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

                <div id="map_cont" class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>Ti aspettiamo qui</h1>

                        <div id="map_embed" class="embed-responsive embed-responsive-16by9">
                            <iframe id="map_canvas" src="{{ config('website.event.venue.map_embed') }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript">
        $('#map_canvas').addClass('scroll-off');

        $('#map_embed').on('click', function () {
            $('#map_canvas').removeClass('scroll-off');
        });

        $("#map_canvas").mouseleave(function () {
            $('#map_canvas').addClass('scroll-off');
        });
    </script>
@stop
