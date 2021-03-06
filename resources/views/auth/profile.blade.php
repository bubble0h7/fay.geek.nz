@extends('layouts.admin')

@section('content')
    <div class="col-12 terminal-window">
        <h1>Profile</h1>
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
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            > logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> 
        <br>
        <br> 
        <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
            </div>
            <div class=" row">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
            </div>
            <div class="row">
                <label for="profile_image">Profile Image</label><br><br>
                <input id="profile_image" type="file" class="form-control" name="profile_image"><br>
                @if (auth()->user()->image)
                    <code>{{ auth()->user()->image }}</code>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button><br><br>
        </form>
        <form action="/profile/deleteImage/{{auth()->user()->id}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger bottom">Delete Profile Image</button>
        </form>  
    </div>
@endsection