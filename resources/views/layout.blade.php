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
        <script type="application/ld+json">
        /*<![CDATA[*/
        {
            "@context": "http://schema.org",
            "@type": "Event",
            "name": "{!! config('website.event.name') !!}",
            "startDate" : "{{ config('website.event.start')->format('Y-m-d\TH:i:sP') }}",
            "url" : "{{ config('website.event.url') }}",
            "location" : {
                "@type" : "Place",
                "sameAs" : "{{ config('website.event.venue.map_url') }}",
                "name" : "{{ config('website.event.venue.name') }}",
                "address" : "{{ config('website.event.venue.address') }}"
            }
        }
        /*]]>*/
        </script>

        <!-- Styles -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:200,300,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/all.css') }}">
    </head>
    <body>
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
        @include('partials.scripts')
    </body>
</html>
