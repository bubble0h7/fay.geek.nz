<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fay Morris | Admin</title>

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
    <body class="main">
        <nav>
            <ul>
                <li class="nav-left"><a href="{{ route('home') }}">~ </a></li>
                <li class="nav-left"><a href="{{ route('now') }}">Now</a></li>
                <li class="nav-left"><a href="{{ route('projects') }}">Projects</a></li>
                <li class="nav-left"><a href="{{ route('files') }}">Files</a></li>
                <li class="nav-left"><a href="https://github.com/bubble0h7" target="_blank">Git</a></li>
                <li class="nav-left"><a href="{{ route('admin') }}"><span id="active">Admin</span></a></li>
                <li id="nav-right">
                    <select id="menu-right">
                        <option value="home">1: home</option>
                        <option value="now">2: now</option>
                        <option value="projects">3: projects</option>
                        <option value="files">4: files</option>
                        <option value="git">5: git</option>
                        @auth
                            <option value="admin">6: admin</option>
                            <option value="profile">7: profile</option>
                        @endauth
                    </select>
                </li>
            </ul>
        </nav>
        <div id="content-container">
            @yield('content')
        </div>
            <footer>
                <div class="col-12">
                    <div id="footer-left" class="text-left">
                        @auth
                            @if (auth()->user()->image)
                                <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                            @endif
                            <span id="logged-in-text"><a href="{{ route('profile') }}">Logged in</a></span>
                        @else
                            Fay Morris<br>
                            <a href="mailto:hi@fay.geek.nz">hi@fay.geek.nz</a>
                        @endauth
                    </div>
                    <div id="footer-right" class="text-left">
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
                </div>
            </footer>
        <script src="js/custom.js"></script>
    </body>
</html>
