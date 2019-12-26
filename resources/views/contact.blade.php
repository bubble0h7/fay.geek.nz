<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache">

        <title>About | Fay Morris </title>
        <meta name="description" content="Homepage of Fay Morris' portfolio website.">
        <meta name="author" content="Fay Morris">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />

        <!-- Styles -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/about">About</a></li>
                <li><a href="https://github.com/bubble0h7" target="_blank">Code</a></li>
                <li><a href="/"><span id="active">Terminal</span></a></li>
                <li id="nav-right">
                <select id="menu-right">
                    <option value="home">1: bash</option>
                    <option value="about" selected>2: about</option>
                    <option value="contact">3: contact</option>
                </select>
                </li>
            </ul>
            </nav>
        
            <div class="col-12">
                <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/fay/portfolio</span><span id="terminal-line" class="text-white">$</span></h1>
            </div>
        
            <div class="col-12 text-left">
                <h3>[CONTACT ME]</h3>
                <p>
                   Email
                </p>
            </div>
            
            <footer>
                <div class="col-6 text-left">
                    Fay Morris<br>
                    <a href="mailto:hi@fay.geek.nz">hi@fay.geek.nz</a>
                </div>
                <div class="col-6 text-right">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <a class="text-blue" href="{{ url('/admin') }}">> admin access</a>
                            @else
                                <a class="text-blue" href="{{ route('login') }}">> login</a>
                            @endauth
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div>
                            <a class="nav-link" href="{{ route('register') }}">> register</a>
                        </div>
                    @endif
                </div>
            </footer>
        
            <script src="js/custom.js"></script>
    </body>
</html>