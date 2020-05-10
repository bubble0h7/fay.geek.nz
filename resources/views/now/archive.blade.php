@extends('layouts.app')

@section('content')
    <div class="breadcrumbs text-left">
        <a href="{{ route('now') }}">cd ..</a>
    </div>
    <div class="col-12 terminal-window">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="now"><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/now/archive</span><span id="terminal-line" class="text-white">$</span></p>

        <div id="result">
            
            @if (count($now_entries) > 0)
                
                    @foreach ($now_entries as $now)
                        <p id="#{{$now->id}}">[{{date("j M Y", strtotime($now->created_at))}}]</h2>
                        <p><strong>[LIFE]</strong></p>
                        <p>
                            <span class="key">ASL =</span> {{$now->age}},{{$now->sex}},{{$now->location}}<br>
                            <span class="key">Occupation =</span> {{$now->occupation}}
                        </p>
                        <p><strong>[FAVOURITES]</strong></p>
                        <p>
                            <span class="key">Currently Listening To =</span> {{$now->listening_to}}<br>
                            <span class="key">Currently Watching =</span> {{$now->watching}}<br>
                            <span class="key">Currently Playing =</span> {{$now->playing}}<br>
                            <span class="key">Currently Reading =</span> {{$now->reading}}
                        </p>
                        <p><strong>[EXCITED ABOUT]</strong></p>
                        <ul class="now">
                            @foreach($now->excited_about as $excited_about)
                                <li>
                                    {{$excited_about}}
                                </li>
                            @endforeach
                        </ul>
                        <p><strong>[WORKING ON]</strong></p>
                        <ul class="now">
                            @foreach($now->working_on as $working_on)
                                <li>
                                    {{$working_on}}
                                </li>
                            @endforeach
                        </ul>
                        <p>
                            <span class="key timestamp">Last Updated =</span> {{$now->updated_at}}
                        </p>
                        <br>
                        <hr>
                        <br>
                    @endforeach
                    @auth
                        <br>
                        <form action="/now/create" method="get">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary bottom" value="New Now Entry"/>
                        </form>
                        <br>
                    @endauth
            @else
                    No now entries found.
                    @auth
                        <br>
                        <form action="/now/create" method="get">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary bottom" value="New Now Entry"/>
                        </form>
                        <br>
                    @endauth
            @endif
            <p class="now"><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/now/archive</span><span class="text-white">$</span><span class="cursor">|</span></p>

        </div>
    </div>
@endsection
