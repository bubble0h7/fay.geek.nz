<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Portfolio | Fay Morris</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />

        <!-- Scripts -->
        <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <script src="{{ asset('js/ckeditor.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/about">
                    @isset($active)
                        @if ($active == "about")
                            <span id="active">About</span>
                        @else
                            About
                        @endif
                    @else
                        About
                    @endisset
                </a></li>
                <li><a href="https://github.com/bubble0h7" target="_blank">Git</a></li>
                <li><a href="/">
                    @isset($active)
                        @if ($active == "terminal")
                            <span id="active">Terminal</span>
                        @else
                            Terminal
                        @endif
                    @else
                        Terminal
                    @endisset
                </a></li>
                <li id="nav-right">
                <select id="menu-right">
                    <option value="home">1: terminal</option>
                    <option value="about">2: about</option>
                    <option value="contact">3: contact</option>
                    @auth
                    <option value="admin">4: admin</option>
                    <option value="profile">5: profile</option>
                    <option value="projects">6: projects</option>
                    @endauth
                </select>
                </li>
            </ul>
        </nav>
        @yield('content')
        <footer>
            <div class="col-6 text-left">
                @auth
                    @if (auth()->user()->image)
                        <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                    @endif
                    Logged in as: <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                @else
                    Fay Morris<br>
                    <a href="mailto:hi@fay.geek.nz">hi@fay.geek.nz</a>
                @endauth
            </div>
            <div class="col-6 text-right">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a class="text-blue" href="{{ url('/admin') }}">> admin</a><br>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                > logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a class="text-blue" href="{{ route('login') }}">> login</a>
                            
                            @if (Route::has('register'))
                                <div>
                                    <a href="{{ route('register') }}">> register</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </footer>
        <script src="js/custom.js"></script>
    </body>
</html>
