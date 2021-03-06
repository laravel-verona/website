@extends('layout')

@section('page_title', trans('lmv.annotations.title', ['date' => $meetup->date->format('d-m-Y')]))
@section('page_descr', trans('lmv.annotations.descr', ['date' => $meetup->date->format('d-m-Y')]))

@section('content')
<header class="header header-small text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        <h1 class="title animated slideInUp">{{ trans('lmv.website.meetup') }}</h1>
        <h2 class="subtitle animated flipInX">{{ $meetup->date->format('l j F Y') }}</h2>
    </div>
</header>

<div id="wrapper">
    <div class="container annotation-cont">
        @if (count($files) > 0)
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

                    @if ($file->commit)
                    <div class="commit-info text-muted">
                        {{ trans('lmv.annotations.last_update') }} <a href="{{ $file->commit->url }}" target="_blank" rel="nofollow">{{ $file->commit->date->format('l j F Y H:i') }}</a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <h3 class="annotations-empty text-muted text-center">
                <i class="fa fa-calendar-times-o"></i> {{ trans('lmv.annotations.empty') }}
            </h3>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    $('.tab-pane table').wrap('<div class="table-responsive"></div>');

    var blob = "{{ config('lmv.annotations.blob').'/'.$meetup->date->format('Y-m-d') }}";

    // I links al repository "Annotations" devono mostrare i tab-pane
    $('.tab-pane a[href^="' + blob +'"][href$=".md"]').on('click', function(e) {
        e.preventDefault();

        var panel_id = $(this).attr('href').replace(blob + '/', '#').replace('.md', '');
        $('.nav-tabs a[href="' + panel_id + '"]').click();
    });
})
</script>
@endsection
