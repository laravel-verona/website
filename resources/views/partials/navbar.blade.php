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
                <li class="{{ starts_with($routeName, 'annotations.') ? 'active' : 'inactive' }}">
                    <a href="{{ route('annotations.index') }}">Annotations</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
