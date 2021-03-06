@extends('layouts.app')

@section('content')
    <div class="breadcrumbs text-left">
        <a href="{{ route('home') }}">cd ..</a>
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
            <p>
                total {{count($projects)}}<br>
                @if (count($projects) > 0)
                    @foreach ($projects as $project)
                        -rw-r--r-- 1 fay web      {{strlen($project->content)}} @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($project->updated_at))){{date("M  d   H:i", strtotime($project->updated_at))}}@else{{date("M  d   Y", strtotime($project->updated_at))}}@endif <a href="/projects/{{str_replace(' ', '-', strtolower($project->title))}}">{{str_replace(' ', '-', strtolower($project->title))}}.txt</a><br>
                    @endforeach
                @else
                    No projects found.
                @endif
            </p>
            @auth
                <br>
                <form action="/projects/create" method="get">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary bottom" value="New Project"/>
                </form>
                <br>
            @endauth
            <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/projects</span><span class="text-white">$</span><span class="cursor">|</span></p>
        </div>
    </div>
@endsection
