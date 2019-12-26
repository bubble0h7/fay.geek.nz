@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('home') }}">cd ..</a>
        </div>
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/projects</span><span id="terminal-line" class="text-white">$</span></h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>    
    <div class="col-10 offset-1">
        <p>
            total {{count($projects)}}<br>
            @if (count($projects) > 0)
                @foreach ($projects as $project)
                    -rw-r--r-- 1 fay 197121      {{strlen($project->content)}} @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($project->updated_at))){{date("M  j   H:i", strtotime($project->updated_at))}}@else{{date("M  j   Y", strtotime($project->updated_at))}}@endif <a href="/projects/{{str_replace(' ', '-', strtolower($project->title))}}">{{str_replace(' ', '-', strtolower($project->title))}}.txt</a><br>
                @endforeach
            @else
                No projects found.
            @endif
        </p>
        @auth
            <br>
            <form action="/projects/create" method="get">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="New Project"/>
            </form>
            <br>
        @endauth
    </div>
@endsection
