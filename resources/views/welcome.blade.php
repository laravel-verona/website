<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('website.name') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                background: url('images/pattern.png');
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                color: #DA402D;
                font-size: 70px;
                margin-bottom: 20px;
                padding-bottom: 20px;
                border-bottom: 1px dotted #ccc;
            }

            .subtitle {
                font-size: 40px;
                margin-bottom: 40px;
            }

            .button {
                color: #fff;
                margin-top: 40px;
                padding: 15px 30px;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #DA402D;
            }
            .button:hover,
            .button:focus,
            .button:active {
                background-color: #D93B36;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">1° Laravel Meetup a Verona</div>
                <div class="subtitle">14 novembre 2015</div>

                <a class="button" rel="nofollow" href="http://www.meetup.com/it/laravel-verona/">Unisciti a noi</a>
            </div>
        </div>
    </body>
</html>
