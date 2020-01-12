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
    </div>
    <div class="col-10 offset-1 text-left value">
        @if(isset($current) && $current != null)
            <p>
                <span class="key"><a href="https://nownownow.com/about" target="_blank">What is this page?</a></span> 'Now' pages are like 'About' pages, but far more relevant to your current state of being. 
                These are the things I care about right now. They take up my time and energy.<br>
                I'm a sucker for nostalgia and reflection, so I have an archive of my now updates <a href="{{ route('now.archive') }}">here</a>.
            </p>
            <h2>[LIFE]</h2>
            <p>
                <span class="key">ASL =</span> {{$current->age}},{{$current->sex}},{{$current->location}}<br>
                <span class="key">Occupation =</span> {{$current->occupation}}
            </p>
            <h2>[FAVOURITES]</h2>
            <p>
                <span class="key">Listening To =</span> {{$current->listening_to}}<br>
                <span class="key">Watching =</span> {{$current->watching}}<br>
                <span class="key">Playing =</span> {{$current->playing}}<br>
                <span class="key">Reading =</span> {{$current->reading}}
            </p>
            <h2>[EXCITED ABOUT]</h2>
            <ul class="now">
                @foreach($current->excited_about as $excited_about)
                    <li>
                        {{$excited_about}}
                    </li>
                @endforeach
            </ul><h2>[WORKING ON]</h2>
            <ul class="now">
                @foreach($current->working_on as $working_on)
                    <li>
                        {{$working_on}}
                    </li>
                @endforeach
            </ul>
            <p>
                <span class="key timestamp">Last Updated =</span> {{$current->updated_at}}
            </p>
        @else
            <p>No now entries found</p>
        @endif
        @auth
            <br>
            <form action="/now/create" method="get" class="text-center">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="New Now Entry"/>
            </form>
            <br>
            @if(isset($current) && $current != null)
                <form action="/now/{{$current->id}}/edit" method="get" class="text-center">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary bottom" value="Edit Current Entry"/>
                </form>
            @endif
            <br>
        @endauth
    </div>
@endsection