@extends('layouts.admin')

@section('content')
    <div class="col-8 terminal-window">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
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
        <h3>Unpublished Posts</h3>
        @if(count($posts) > 0)
            <ul class="text-left">    
                @foreach($posts as $post)
                    <li>
                        <a href="/blog/post/{{str_replace(' ', '-', strtolower($post->title))}}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>
                None found.
            </p>
        @endif
        
        <br>
        <h3>Create Something</h3>
        <form action="{{ route('post.create') }}" method="get" class="text-center">
            <input type="submit" class="btn btn-primary" value="New Post"/>
        </form>
        <br>
        <form action="/now/create" method="get" class="text-center">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="New Now Entry"/>
        </form>
        <br>
        <form action="/projects/create" method="get" class="text-center">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="New Project"/>
        </form>
        <br>
        <form action="{{ route('file.create') }}" method="get" class="text-center">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="Upload File"/>
        </form>
        <br>
        <br>
        <br>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            > logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
