<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comics | @yield("title")</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
    @include("includes.header")
    @yield("admin")

    <main>
        @yield("main-content")
    </main>
    
    @include("includes.footer")


    @yield("scripts")
</body>
</html>