@extends('layouts.admin')

@section('content')
    <div class="col-12">
        <h1>Create Post</h1>
        <br>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="">
            </div><br>
    </div>
    <div class="col-10 offset-1">
            <div class="row">
                <textarea id="content" type="text" class="form-control" name="content"></textarea>
            </div><br>
            <div class="row">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
