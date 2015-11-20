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
                        <h1>{{ trans('lmv.website.join_us') }}</h1>

                        <p>{{ trans('lmv.home.content_1') }}</p>
                        <p>{{ trans('lmv.home.content_2') }}</p>

                        <h3 class="event-reminder">
                            {{ trans('lmv.home.reminder', [
                                'name'       => config('lmv.event.name'),
                                'date'       => config('lmv.event.start')->format('l j F'),
                                'end_hour'   => config('lmv.event.end')->format('H:i'),
                                'start_hour' => config('lmv.event.start')->format('H:i'),
                            ]) }}
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
                    {{ trans('lmv.website.join_meetup') }}
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
