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
