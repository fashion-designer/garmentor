<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GARMENTOR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .auth-links {
                background-color: antiquewhite;
                padding: 10px !important;
            }
            .auth-links :hover {
                background-color: #2a88bd;
            }
            .app-logo {
                font-family: 'Poiret One';
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Welcome to <span class="app-logo">GARMENTOR</span>
                </div>

                <div class="links">
                    <a class="auth-links" href="{{ url('/login') }}">User Login</a>
                    <a class="auth-links" href="{{ url('admin/login') }}">Admin Login</a>
                    <a class="auth-links" href="{{ url('designer/login') }}">Designer Login</a>
                    <a class="auth-links" href="{{ url('/register') }}">User Register</a>
                    <a class="auth-links" href="{{ url('admin/register') }}">Admin Register</a>
                    <a class="auth-links" href="{{ url('designer/register') }}">Designer Register</a>
                </div>
            </div>
        </div>
    </body>
</html>
