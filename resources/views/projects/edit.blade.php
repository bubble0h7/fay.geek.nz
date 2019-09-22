@extends('layouts.app')

@section('content')
    <div class="col-12">
        <h2>Edit Project</h2>
        <br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <br>

        <form action="update" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="{{$project->title}}">
            </div><br>
            <div class="row">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control" name="description" value="{{$project->description}}">
            </div><br>
            <div class="row">
                <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
            </div>
    </div>
    <div class="col-8">
            <div class="row">
                <textarea id="content" type="text" class="form-control" name="content">{{$project->content}}</textarea>
            </div><br>
            <div class="row">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
