@extends('layout')

@section('content')
<header class="header header-small text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        <h1 class="title animated slideInUp">Annotation</h1>
        <h2 class="subtitle animated flipInX">{{ $annotation->date->format('j F Y') }}</h2>
    </div>
</header>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials.annotations-menu')
            </div>

            <div class="col-md-9">
                {!! $annotation->html !!}
            </div>
        </div>
    </div>
</div>
@stop
