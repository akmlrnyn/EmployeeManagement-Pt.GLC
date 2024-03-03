<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body{
            background-color: rgb(237, 237, 237);
        }
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        .alert{
            color: rgb(99, 99, 99);
            margin-top: 2rem;
            padding: 2rem;
            text-align: center;
        }
        .img-error{
            margin: 0 auto;
        }
    </style>
</head>
<body>
        <div class="alert">
            <img class="img-error" src="{{ url('img/logo_company.png') }}" width="40" alt="">
            <h1 class="error-code">503</h1>
            <p class="">Oops! Something is wrong. Service unavailable. Please try again later</p>
        </div>
</body>
</html>