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
</head>
<body>
    <div id="app" class="container-flush">
        <!--
            Display instructions at beginning using popup or modal
            then hide instructions into question mark info icon
        -->
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
    
    <!-- Scripts -->
    <!--script src="https://unpkg.com/blockly/blockly.min.js"></!--script>-->

    <script>
        var blocklyArea = document.getElementById('blocklyArea');
        var blocklyDiv = document.getElementById('blocklyDiv');
        var demoWorkspace = Blockly.inject(blocklyDiv,
            {media: 'https://unpkg.com/blockly/media/',
             toolbox: document.getElementById('toolbox')});
        var onresize = function(e) {
          // Compute the absolute coordinates and dimensions of blocklyArea.
          var element = blocklyArea;
          var x = 0;
          var y = 0;
          do {
            x += element.offsetLeft;
            y += element.offsetTop;
            element = element.offsetParent;
          } while (element);
          // Position blocklyDiv over blocklyArea.
          blocklyDiv.style.left = x + 'px';
          blocklyDiv.style.top = y + 'px';
          blocklyDiv.style.width = blocklyArea.offsetWidth + 'px';
          blocklyDiv.style.height = blocklyArea.offsetHeight + 'px';
          Blockly.svgResize(demoWorkspace);
        };
        window.addEventListener('resize', onresize, false);
        onresize();
        Blockly.svgResize(demoWorkspace);
    </script>
</body>

</html>
