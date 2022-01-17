<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav-elem">

        <a class="navbar-brand" href="
                                    @guest
                                        {{ url('/') }}
                                    @endguest 
                                    @auth
                                        {{ url('/'.Auth::user()->role)}}   
                                    @endauth
                                    ">
            <img class="nav-logo" src={{asset("/storage/images/small-logo.png")}} alt={{ config('app.name', 'Laravel') }}>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link " href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="/products">Products</a>
                    </li>
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

</nav>