@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <form action="/projects/create" method="get">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="New Project"/>
                    </form>
                    <br>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <a href="/projects/{{$project->id}}">{{$project->title}}</a> - {{$project->description}}<br>
                        @endforeach
                    @else
                        No projects found.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
