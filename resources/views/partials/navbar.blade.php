@inject('annotationRepo', App\Repository\AnnotationRepository')

@set('router', Route::current())
@set('routeName', $router ? $router->getName() : false)
@set('meetupNav', $annotationRepo->getMeetupNavigation())
@set('isAnnotation', Request::is('annotations/*'))

<nav class="navbar navbar-inverse navbar-fixed-top navbar-lmv">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">{{ trans('lmv.website.title') }}</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ $routeName === 'home' ? 'active' : 'inactive' }}">
                    <a href="{{ route('home') }}">{{ trans('lmv.home.title') }}</a>
                </li>

                @if (count($meetupNav))
                <li class="dropdown {{ $isAnnotation ? 'active' : 'inactive' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ trans('lmv.annotations.menu') }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        @foreach($meetupNav as $meetup)
                        <li class="text-capitalize {{ ($isAnnotation and $router->parameter('date') == $meetup->date->format('Y-m-d')) ? 'active' : 'inactive' }}">
                            <a href="{{ route('annotations.index', $meetup->path) }}">{{ $meetup->date->format('l j F Y') }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
