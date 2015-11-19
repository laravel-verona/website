@extends('layout')

@section('page_title', trans('lmv.errors.down.title'))
@section('page_descr', false)

@section('meta')
<meta name="robots" content="noindex,nofollow">
@stop

@section('content')
<div id="wrapper" class="text-center">
    <div id="error" class="container">
        <div class="title-cont">
            @include('partials.logo')

            <h1 class="title animated slideInUp">{{ trans('lmv.errors.down.title') }}</h1>
            <h2 class="subtitle animated flipInX">{{ trans('lmv.errors.down.content') }}</h2>
        </div>
    </div>
</div>
@stop
