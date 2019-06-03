@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Project</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="update" method="post">
                        {{ csrf_field() }}
                        <input name="title" value="{{$project->title}}"/>
                        <input name="description" value="{{$project->description}}"/>
                        <textarea name="content">{{$project->content}}</textarea>
                        <input type="submit" value="Update"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
