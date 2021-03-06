<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fay Morris | It Me</title>

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
    <body @if ($active == "now") class="now" @else class="main" @endif>
        <nav>
            <ul>
                <li class="nav-left"><a href="{{ route('home') }}">
                    @isset($active)
                        @if ($active == "home")
                            <span id="active">~</span>
                        @else
                            ~
                        @endif
                    @else
                        ~
                    @endisset
                </a></li>
                <li class="nav-left"><a href="{{ route('now') }}">
                    @isset($active)
                        @if ($active == "now")
                            <span id="active">Now</span>
                        @else
                            Now
                        @endif
                    @else
                        Now
                    @endisset
                </a></li>
                <li class="nav-left"><a href="{{ route('projects') }}">
                    @isset($active)
                        @if ($active == "projects")
                            <span id="active">Projects</span>
                        @else
                            Projects
                        @endif
                    @else
                        Projects
                    @endisset
                </a></li>
                <li class="nav-left"><a href="{{ route('blog') }}">
                    @isset($active)
                        @if ($active == "blog")
                            <span id="active">Blog</span>
                        @else
                            Blog
                        @endif
                    @else
                        Blog
                    @endisset
                </a></li>
                <li class="nav-left"><a href="{{ route('files') }}">
                    @isset($active)
                        @if ($active == "files")
                            <span id="active">Files</span>
                        @else
                            Files
                        @endif
                    @else
                        Files
                    @endisset
                </a></li>
                <li class="nav-left"><a href="https://github.com/bubble0h7" target="_blank">Git</a></li>
                @auth
                    <li class="nav-left"><a href="{{ route('admin') }}">Admin</a></li>
                @endauth
                <li id="nav-right">
                <select id="menu-right">
                    <option value="home">1: home</option>
                    <option value="now">2: now</option>
                    <option value="projects">3: projects</option>
                    <option value="blog">4: blog</option>
                    <option value="files">5: files</option>
                    <option value="git">6: git</option>
                    @auth
                    <option value="admin">7: admin</option>
                    <option value="profile">8: profile</option>
                    @endauth
                </select>
                </li>
            </ul>
        </nav>
        @yield('content')
        <footer class="col-12">
            @if (Route::has('login'))
                @auth
                    <a class="text-blue" href="{{ url('/admin') }}">> admin</a>
                @else
                    <a class="text-blue" href="{{ route('login') }}">> login</a>
                @endauth
            @endif
            @auth
                @if (auth()->user()->image)
                    <a href="{{ route('profile') }}"><img src="{{ asset(auth()->user()->image) }}"></a>
                @endif
            @endauth
        </footer>
        <script src="js/custom.js"></script>
    </body>
</html>
