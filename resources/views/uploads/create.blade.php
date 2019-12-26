@extends('layouts.admin')

@section('content')
    <div class="col-10 offset-1">
        <h1>Upload New File</h1>
        <br>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <br>
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

        <form action="{{ route('file.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="">
            </div><br>
            <div class="row">
                <label for="file">File</label>
                <input id="file" type="file" class="form-control" name="file">
            </div><br>
            <div class="row">
                <button type="submit" class="btn btn-success now">Save</button>
            </div>
        </form>
    </div>
@endsection
