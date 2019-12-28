@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('home') }}">cd ..</a>
        </div>
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/blog</span><span id="terminal-line" class="text-white">$</span></h1>
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
    </div>    
    <div class="col-10 offset-1">
        <p>
            total {{count($posts)}}<br>
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    -rw-r--r-- 1 fay 197121      {{strlen($post->content)}} @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($post->updated_at))){{date("M  j   H:i", strtotime($post->updated_at))}}@else{{date("M  j   Y", strtotime($post->updated_at))}}@endif <a href="/blog/post/{{str_replace(' ', '-', strtolower($post->title))}}">{{str_replace(' ', '-', strtolower($post->title))}}.txt</a>
                    <br>
                @endforeach
            @else
                No posts found.
            @endif
        </p>
        @auth
            <br>
            <form action="{{ route('post.create') }}" method="get">
                <input type="submit" class="btn btn-primary" value="New Post"/>
            </form>
            <br>
        @endauth
    </div>
@endsection
