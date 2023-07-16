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

    <!--Load app's scripts-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--Load Blockly package-->
    <script src="{{asset('js/blockly_compressed.js')}}"></script>
    <script src="{{asset('js/blocks_compressed.js')}}"></script>
    <script src="{{asset('js/msg/en.js')}}"></script>
</head>
<body>
    <div id="app" class="container-flush">
        <!--
            Display instructions at beginning using popup or modal
            then hide instructions into question mark info icon
        -->
        @include("inc.navbar")
        @include("inc.messages")
        @yield("content")
        <div class="row fixed-bottom">
            <div class="col-md-4">
                @if (Auth::user()->role == "teacher")
                    <a href="{{route("modules.index")}}" class="btn btn-default">Go Back</a>
                @else
                    <a href="/student" class="btn btn-default">Go Back</a>
                @endif
            </div>
            <div class="col-md-8">
                {!! Form::open(['action' => "StudentController@store", 'method'=>'POST', 'class'=>"float-right px-1"]) !!}
                    {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
</body>

</html>
