@extends('layout')

@section('page_title', trans('lmv.tools.title'))
@section('page_descr', trans('lmv.tools.descr'))

@section('content')
<header class="header header-small text-center">
    <div class="overlay"></div>

    <div class="title-cont">
        <h1 class="title animated slideInUp">{{ trans('lmv.tools.title') }}</h1>
    </div>
</header>

<div id="wrapper">
    <div class="container annotation-cont">
        <div class="row">
            <div class="col-md-3">
                <ul class="annotation-menu list-unstyled">
                    @foreach($file->getHeadings() as $anchor => $title)
                    <li>
                        <a href="#{{ $anchor }}">&nbsp; &rsaquo; {{ $title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9 tools-cont">
                {!! $file->html !!}
            </div>
        </div>

        @if ($file->commit)
        <div class="commit-info text-muted">
            {{ trans('lmv.annotations.last_update') }} <a href="{{ $file->commit->url }}" target="_blank" rel="nofollow">{{ $file->commit->date->format('l j F Y H:i') }}</a>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    $('.tools-cont h2').each(function() {
        var name = $(this).text().replace(/ /g, '_').replace(/&/g, 'and');
        $(this).prepend('# ').attr('id', name.toLowerCase());
    });
})
</script>
@endsection
