<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('/css/index.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@500&display=swap" rel="stylesheet">
        <title>Victus</title>
    </head>
    <body>
        <img style="border:0;margin-left:44.1%;width: 12%; min-height:5%; margin-bottom:-1.5% !important;margin-top:-1.5%" src="/larapp/victus/victus2.png">
        <p class="under">Increasing your wellness</p>
        @include('navigation.navbar')
        @include('errors.messages')
        @yield('content')
        <hr style="height:3px; color:#dbb4d3">
        <p class="cp-text">
            © Copyright 2020 Victus. All rights reserved.
        </p>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'summary-ckeditor' );
        </script>
    </body>
</html>
