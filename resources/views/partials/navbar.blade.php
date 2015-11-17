<nav class="navbar navbar-inverse navbar-fixed-top navbar-lmv">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/">{{ config('website.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/notes">Notes</a>
                </li>
                <li>
                    <a href="/staff">Staff</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
