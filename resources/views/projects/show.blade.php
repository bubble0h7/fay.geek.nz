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
                        <h1>{{$project->title}}</h1>
                        <h4><em>{{$project->description}}</em></h4> 
                        <p>{!!$project->content!!}</p>
                        <p>Posted at <em>{{$project->created_at}}</em> | Last Updated at <em>{{$project->updated_at}}</em></p>

                        <form action="/projects/{{$project->id}}/edit" method="get">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Edit"/>
                        </form>
                        <br>
                        <form action="/projects/{{$project->id}}/delete" method="post">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
