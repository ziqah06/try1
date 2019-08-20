<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
        <title>{{ config('app.name','Ziqablog') }}</title>

        
    </head>
    <body>
        @include('include.navbar') <!--('nama folder.nama file)-->
        <div class="container"> <!--class container mmg dah ada dri bootstrap-->
            @yield('content')
        </div>
    </body>
</html>
