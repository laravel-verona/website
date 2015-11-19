@extends('layout')

@section('page_title', trans('lmv.not_found.title'))
@section('page_descr', '')

@section('content')
<header class="header text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        @include('partials.logo')

        <h1 class="title animated slideInUp">{{ trans('lmv.not_found.code') }}</h1>
        <h2 class="subtitle animated flipInX">{{ trans('lmv.not_found.content') }}</h2>
    </div>
</header>

<div id="wrapper" class="text-center">
    <div class="container">

    </div>
</div>
@stop
