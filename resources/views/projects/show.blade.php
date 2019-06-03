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
                        {{$project->title}} <br>
                        {{$project->description}} <br>
                        {{$project->content}} <br>
                        {{$project->created_at}} <br>
                        {{$project->updated_at}} <br>

                        <a href="/projects/{{$project->id}}/edit">Edit</a><br>

                        <form action="/projects/{{$project->id}}/delete" method="post">
                            {{ csrf_field() }}
                            <input type="submit" value="Delete"/>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
