<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>@yield('title')</title>

    <style>
        body {
            color:#FFF;
            margin:0 0 0 0;
            padding:0 0 0 0;
            font-family:"proxima-nova",sans-serif;
            font-size:20px;
            background:url('/images/login_background_image_designer.jpg') repeat;
            background-size: 100%;
        }
        .app-logo {
            font-family: 'Poiret One';
            font-weight: 800;
        }
        .loginWrapper {
            width:400px;
            height:400px;
            text-align:center;
            position:absolute;
            left:50%;
            top:45%;
            margin:-200px -200px -200px -200px;
        }

        input.login-input {
            outline:none;
            border:none;
            border-radius:3px;
            font-size:16px;
            font-family:"proxima-nova",sans-serif;
            padding:15px;
            background-color:#eee;
            margin-bottom:10px;
            width:80%;
            color:#000;
        }
        input.login-input::-webkit-input-placeholder {
            color: #666;
        }
        input.login-input:-moz-placeholder {
            color: #666;
        }

        input.login-input:focus {
            background-color:#fff;
            color:#000;
        }

        .login-button {
            outline:none;
            border:none;
            font-size:16px;
            padding-top:15px;
            padding-bottom:15px;
            padding-left:25px;
            padding-right:25px;
            background-color:#1769bd;
            color:#fff;
            border-radius:5px;
            cursor:pointer;
            font-family:"proxima-nova",Helvetica,Arial,sans-serif;
            font-weight:700;
            -webkit-appearance:none;
            text-transform: uppercase;
            width: 80%;
        }

        .login-button:hover {
            background-color:#1564b3;
            color: white;
        }
        .login-button:active {
            box-shadow:none;
            position:relative;
            top:3px;
        }

        .loginFormWrap{
            margin-top: 20px;
            background: rgba(0, 0, 0, 0.4);
            padding: 15px 0 20px;
        }

        .loginFormWrap .login-forgot-password{
            color: #eee;
            display: inline-block;
            font-size: 0.8em;
            padding: 10px;
            text-decoration: underline;
        }

        @media screen and (max-width: 400px) {
            .loginFormWrap{
                background-color: transparent;
            }
        }

        .heading {
            font-size: 40px;
            margin-bottom: 10px;
            color: #ffffff;
        }

        a {
            color:#FFF;
            text-decoration: underline;
        }
        @media(max-width:650px) {
            .loginWrapper {
                width:100%;
                height:100%;
                text-align:center;
                position:relative;
                padding:35px;
                left:auto;
                top:auto;
                margin:0;
            }
        }

        .error {
            background: #CC0000;
            width: 100%;
            margin: 5px 0 5px 0;
            padding: 8px;
            color: #FFF;
            display: block;
        }
    </style>
</head>
<body>
<div class="loginWrapper">
    @yield('content')
</div>
</body>
</html>
