<nav class="navbar navbar-inverse navbar-fixed-top navbar-lmv">
    <div class="container">
        @set('routeName', app('router')->current()->getName())

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}">{{ config('lmv.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ $routeName === 'home' ? 'active' : 'inactive' }}">
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Annotations <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        @foreach($meetupList as $meetup)
                        <li class="text-capitalize">
                            <a href="{{ route('annotations.index', $meetup->path) }}">{{ $meetup->date->format('l j F Y') }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
