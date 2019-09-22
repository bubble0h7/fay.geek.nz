@extends('layouts.app')

@section('content')
        
    <div class="col-12">
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/fay/portfolio</span><span id="terminal-line" class="text-white">$</span></h1>
    </div>

    <div class="col-12">
        @if (count($projects) > 0)
            <p>
                <a href="{{ route('projects') }}">projects</a>
            </p>
        @endif
        <h2>This site is under construction. Be gentle.</h2>
    </div>
@endsection
