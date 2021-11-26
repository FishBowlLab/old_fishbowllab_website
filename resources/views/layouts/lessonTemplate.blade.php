<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href={{asset("/storage/images/logo.png")}}>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body id="blockly_body">
    <div id="app">
       <div id="fillDiv" class="container-flush">
            @include("inc.navbar")
            @include("inc.messages")
            <div class="d-none d-md-block">
                @if (Auth::user()->role == "teacher")
                    <a href="{{route("modules.index")}}" class="btn btn-default">Go Back</a>
                @else
                    <a href="/student" class="btn btn-default">Go Back</a>
                @endif
            </div>
            @yield("content")
        </div>  
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/blockly/blockly.min.js"></script>
    <script src="{{ asset('js/blocklyBase.js') }}" defer></script>
</body>

</html>
