@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('home') }}"><-- home </a><a href="{{ route('projects') }}">/ projects</a>
        </div>
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/projects</span><span id="terminal-line" class="text-white">$</span></h1>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    </div>
    <div class="col-10 offset-1">
        <h2><span class="key">Project =</span> {{$project->title}}</h2>
        <p><span class="key">Description =</span> {{$project->description}}</p> 
        <p class="content value">{!!$project->content!!}</p>
        <p class="timestamp">
            <span class="key">Post Created =</span> <em>{{$project->created_at}}</em><br>
            <span class="key">Last Updated =</span> <em>{{$project->updated_at}}</em>
        </p>
        @auth
            <form action="/projects/{{$project->id}}/edit" method="get">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="Edit"/>
            </form>
            <br>
            <form action="/projects/{{$project->id}}/delete" method="post">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </form>
        @endauth
    </div>
@endsection
