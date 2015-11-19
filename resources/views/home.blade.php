@extends('layout')

@section('page_title', trans('lmv.home.title'))
@section('page_descr', trans('lmv.home.descr'))

@section('content')
<header class="header text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        @include('partials.logo')

        <h1 class="title animated slideInUp">{{ config('lmv.event.name') }}</h1>
        <h2 class="subtitle animated flipInX">{{ config('lmv.event.start')->format('j F Y') }}</h2>
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

                        <h3 class="event-reminder">
                            Ti aspettiamo {{ config('lmv.event.start')->format('l j F') }}, dalle {{ config('lmv.event.start')->format('H:i') }} alle {{ config('lmv.event.end')->format('H:i') }}, al {{ config('lmv.event.name') }}
                        </h3>
                    </div>
                </div>

                <div id="countdown" class="clearfix">
                    <div id="countdown-days" class="countdown-partial"></div>
                    <div id="countdown-hours" class="countdown-partial"></div>
                    <div id="countdown-minutes" class="countdown-partial"></div>
                    <div id="countdown-seconds" class="countdown-partial"></div>
                </div>

                <a class="btn btn-lg btn-lmv text-uppercase" target="_blank" href="{{ config('lmv.social.meetup') }}">
                    {{ trans('lmv.website.join') }}
                </a>

                @set('map_embed', config('lmv.event.venue.map_embed'))

                @if ($map_embed)
                <div id="map_cont" class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>{{ trans('lmv.website.venue') }}</h1>

                        <div id="map_embed" class="embed-responsive embed-responsive-16by9">
                            <iframe id="map_canvas" src="{{ $map_embed }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    $('#map_canvas').addClass('scroll-off');

    $('#map_embed').on('click', function () {
        $('#map_canvas').removeClass('scroll-off');
    });

    $("#map_canvas").mouseleave(function () {
        $('#map_canvas').addClass('scroll-off');
    });
</script>
@stop