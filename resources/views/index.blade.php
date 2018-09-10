<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="/css/app.css" rel="stylesheet">
        <title>Web Dev Buddies</title>
    </head>

    <body>
        <div id="wdb-app">
            <router-view></router-view>
        </div>
    </body>
    <script src="/js/app.js"></script>
</html>
