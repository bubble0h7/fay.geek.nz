@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="breadcrumbs">
            <a href="{{ route('home') }}"><-- home</a><br>
        </div>
        @auth
            <br>
            <form action="/projects/create" method="get">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="New Project"/>
            </form>
            <br>
        @endauth
        <h2>Projects</h2>
        @if (count($projects) > 0)
            @foreach ($projects as $project)
                <a href="/projects/{{$project->id}}">{{$project->title}}</a> - {{$project->description}}<br>
            @endforeach
        @else
            No projects found.
        @endif
    </div>
@endsection
