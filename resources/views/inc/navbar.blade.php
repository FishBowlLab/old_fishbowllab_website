<nav id="mainNav" class="navbar navbar-expand-lg navbar-light 
                                                        @if(Request::is('/'))
                                                            fixed-top
                                                        @else
                                                            navbar-shrink
                                                        @endif
                                                        ">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="
                                                        @guest
                                                            /
                                                        @endguest 
                                                        @auth
                                                            {{ url('/'.Auth::user()->role)}}   
                                                        @endauth
                                                        ">
            <img class="nav-logo" src={{asset("/storage/images/small-logo.png")}} alt={{ config('app.name', 'Laravel') }}>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarResponsive" class="collapse navbar-collapse">
            @guest
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @if(Request::is('/'))
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link js-scroll-trigger" href="#home">FishBowlLab</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link js-scroll-trigger" href="#features">About</a>
                        </li>
                        <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                            <a class="nav-link js-scroll-trigger"  href="#about-us">Products</a>
                        </li>
                    @else
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link js-scroll-trigger" href="{{url('/')}}">FishBowlLab</a>
                        </li>
                    @endif
                </ul>
            @endguest
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    {{--
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ ucwords(Auth::user()->name) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/{{Auth::user()->role}}" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>