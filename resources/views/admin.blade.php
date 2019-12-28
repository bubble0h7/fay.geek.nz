@extends('layouts.admin')

@section('content')
    <div class="col-8 offset-2">
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
        @if(isset($posts) && $posts != null)
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
            None found.
        @endif
    </div>
@endsection
