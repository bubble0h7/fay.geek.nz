@extends('layouts.app')

@section('content')

    <div class="breadcrumbs text-left">
        <a href="{{ route('projects') }}">cd ..</a>
    </div>

    <div class="col-12 terminal-window">
        <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/projects</span><span id="terminal-line" class="text-white">$</span></p>
        
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
        <div id="result">
            <h2 ><span class="key">Project =</span> {{$project->title}}</h2>
            <p ><span class="key">Description =</span> {{$project->description}}</p> 
            <p class="value">{!!$project->content!!}</p>
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
                    <input type="submit" class="btn btn-danger bottom" value="Delete"/>
                </form>
            @endauth
            <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/projects</span><span class="text-white">$</span><span class="cursor">|</span></p>    
        </div>
    </div>
@endsection
