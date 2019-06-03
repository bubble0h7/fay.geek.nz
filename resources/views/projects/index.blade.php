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
                    <a href="/projects/create">New</a><br><br>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <a href="/projects/{{$project->id}}">{{$project->title}}</a> <br>
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
