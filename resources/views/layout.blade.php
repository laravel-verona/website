<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('page_title') | {{ trans('lmv.website.title') }}</title>

        @yield('meta')
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        @if ($__env->yieldContent('page_descr'))
        <meta name="description" content="@yield('page_descr')">
        @endif

        <meta name="keywords" content="laravel, php, framework, web, meetup, verona">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Open Graph -->
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('page_title')" />
        <meta property="og:url" content="{{ URL::current() }}" />

        @if ($__env->yieldContent('page_descr'))
        <meta property="og:description" content="@yield('page_descr')" />
        @endif

        <meta property="og:image" content="{{ asset('assets/images/preview.jpg') }}" />
        <meta property="og:image:width" content="750" />
        <meta property="og:image:height" content="389" />
        <meta property="og:locale" content="it_IT" />
        <meta name="twitter:image" content="{{ asset('assets/images/preview.jpg') }}" />
        <meta name="twitter:card" content="summary_large_image" />

        <!-- Rich Snippet -->
        <script type="application/ld+json">
        /*<![CDATA[*/
        {
            "@context": "http://schema.org",
            "@type": "Event",
            "name": "{!! config('lmv.event.name') !!}",
            "startDate" : "{{ config('lmv.event.start')->format('Y-m-d\TH:i:sP') }}",
            "url" : "{{ config('lmv.event.url') }}",
            "location" : {
                "@type" : "Place",
                "sameAs" : "{{ config('lmv.event.venue.map_url') }}",
                "name" : "{{ config('lmv.event.venue.name') }}",
                "address" : "{{ config('lmv.event.venue.address') }}"
            }
        }
        /*]]>*/
        </script>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:200,300,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/all.css') }}">

        @yield('styles')
    </head>
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
        @include('partials.scripts')

        @yield('scripts')
    </body>
</html>
