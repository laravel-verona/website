@extends('layout')

@section('content')
<header class="header header-small text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        <h1 class="title animated slideInUp">MEETUP</h1>
        <h2 class="subtitle animated flipInX">{{ $meetup->date->format('l j F Y') }}</h2>
    </div>
</header>

<div id="wrapper">
    <div class="container annotation-cont">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            @foreach($files as $index => $file)
            <li role="presentation" class="{{ $index === 0 ? 'active' : 'inactive' }}">
                <a href="#{{ $file->name }}" class="text-uppercase" role="tab" data-toggle="tab">{{ $file->name }}</a>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($files as $index => $file)
            <div role="tabpanel" id="{{ $file->name }}" class="tab-pane {{ $index === 0 ? 'active' : 'inactive' }}">
                {!! $file->html !!}
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
$(function() {
    $('.tab-pane table').wrap('<div class="table-responsive"></div>');
})
</script>
@stop
