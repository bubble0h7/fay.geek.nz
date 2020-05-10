@extends('layouts.admin')

@section('content')
    <div class="col-12 terminal-window">
        <h1>Edit Post</h1>
        <br>
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
        <br>

        <form action="update" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="{{$post->title}}">
            </div><br>
            <div class="row">
                <textarea id="content" type="text" class="form-control" name="content">{{$post->content}}</textarea>
            </div><br>
            <div class="row">
                <button type="submit" class="btn btn-success bottom">Save</button>
            </div>
        </form>
    </div>
@endsection
