@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('home') }}">cd ..</a>
        </div>
        <h1 class="now"><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/now</span><span id="terminal-line" class="text-white">$</span></h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="row">
        @if (count($now_entries) > 0)
            <div class="col-8 offset-1">
                @foreach ($now_entries as $now)
                    <h2 id="#{{$now->id}}">[{{date("j M Y", strtotime($now->created_at))}}]</h2>
                    <h3>[LIFE]</h3>
                    <p>
                        <span class="key">ASL =</span> {{$now->age}},{{$now->sex}},{{$now->location}}<br>
                        <span class="key">Occupation =</span> {{$now->occupation}}
                    </p>
                    <h3>[FAVOURITES]</h3>
                    <p>
                        <span class="key">Currently Listening To =</span> {{$now->listening_to}}<br>
                        <span class="key">Currently Watching =</span> {{$now->watching}}<br>
                        <span class="key">Currently Playing =</span> {{$now->playing}}<br>
                        <span class="key">Currently Reading =</span> {{$now->reading}}
                    </p>
                    <h3>[EXCITED ABOUT]</h3>
                    <ul class="now">
                        @foreach($now->excited_about as $excited_about)
                            <li>
                                {{$excited_about}}
                            </li>
                        @endforeach
                    </ul>
                    <h3>[WORKING ON]</h3>
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
                    <hr>
                @endforeach
            </div>
            <div class="col-2">
                <h2>Archive</h2>
                @if (count($now_entries) > 0)
                    @foreach ($now_entries as $now)
                        <a href="#{{$now->id}}">{{date("j M Y", strtotime($now->created_at))}}</a><br>
                    @endforeach
                @else
                    No now entries found.
                @endif
            </div>
        @else
            No now entries found.
        @endif
        @auth
            <br>
            <form action="/now/create" method="get">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="New Now Entry"/>
            </form>
            <br>
        @endauth
    </div>
@endsection
