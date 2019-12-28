@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('blog') }}">cd ..</a>
        </div>
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/blog/posts/</span><span id="terminal-line" class="text-white">$</span></h1>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    </div>
    <div class="col-10 offset-1 blog-post">
        @if($post != null)
            <h2>{{$post->title}}</h2>
            <p class="content value">{!!$post->content!!}</p>
            <p class="timestamp">
                <span class="key">Post Created =</span> <em>{{$post->created_at}}</em><br>
                <span class="key">Last Updated =</span> <em>{{$post->updated_at}}</em>
            </p>
            @auth
                <form action="blog/post/{{$post->id}}/edit" method="get">
                    <input type="submit" class="btn btn-primary" value="Edit"/>
                </form>
                <br>
                <form action="blog/post/{{$post->id}}/delete" method="post">
                    <input type="submit" class="btn btn-danger bottom" value="Delete"/>
                </form>
            @endauth
        @else
            No post found.
        @endif
    </div>
@endsection
