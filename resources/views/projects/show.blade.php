@extends('layouts.app')

@section('content')
    <div class="col-6 offset-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="breadcrumbs">
            <a href="{{ route('home') }}"><-- home </a><a href="{{ route('projects') }}">/ projects</a>
        </div>

        <h2>{{$project->title}}</h2>
        <h4><em>{{$project->description}}</em></h4> 
        <p class="content">{!!$project->content!!}</p>
        <p class="timestamp">Posted at <em>{{$project->created_at}}</em> | Last Updated at <em>{{$project->updated_at}}</em></p>
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
