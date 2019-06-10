<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache">

        <title>Portfolio | Fay Morris </title>
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
                <li><a href="/code">Code</a></li>
                <li><a href="/index"><span id="active">Terminal</span></a></li>
                <li id="nav-right">
                <select id="menu-right">
                    <option value="" selected>1: bash</option>
                    <option value="about">2: about</option>
                    <option value="">3: cv</option>
                    <option value="">4: contact</option>
                </select>
                </li>
            </ul>
            </nav>
        
            <div class="col-12">
            <h1><span id="green">bubble0h7@toothless</span> <span id="purple">MINGW64</span> <span id="yellow">/fay/portfolio</span></h1>
            <h2 id="terminal-line" class="text">$</h2>
            </div>
        
            <div class="col-12">
            <p>
                This site is under construction.
            </p>
            </div>
            
            <footer>
                Fay Morris<br>
                <span id="green"><a href="mailto:hi@fay.geek.nz">hi@fay.geek.nz</a></span> 
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a id="blue" href="{{ url('/admin') }}">> admin access</a>
                        @else
                            <a id="blue" href="{{ route('login') }}">> login</a>
                        @endauth
                    </div>
                @endif
                <img id="coding-fay" src="img/2019-me-glow-glasses-nobackground-cropbottom.png">
            </footer>
        
            <script src="js/custom.js"></script>
    </body>
</html>
