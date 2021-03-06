@extends('layouts.app')

@section('content')
    <div class="breadcrumbs text-left">
        <a href="{{ route('blog') }}">cd ..</a>
    </div>
    <div class="col-12 terminal-window">
        <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/blog/posts</span><span id="terminal-line" class="text-white">$</span></p>
        
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
        <div id="result">
            @if($post != null)
                <h2>{{$post->title}}</h2>
                <p class="content value">{!!$post->content!!}</p>
                <p class="timestamp">
                    <span class="key">Post Created =</span> <em>{{$post->created_at}}</em><br>
                    <span class="key">Last Updated =</span> <em>{{$post->updated_at}}</em>
                </p>
                @auth
                    @if($post->published == 1)
                        <a href="{{$post->id}}/unpublish">Unpublish</a><br><br>
                    @else
                        <a href="{{$post->id}}/publish">Publish</a><br><br>
                    @endif
                    <form action="{{$post->id}}/edit" method="get">
                        <input type="submit" class="btn btn-primary" value="Edit"/>
                    </form>
                    <br>
                    <form action="{{$post->id}}/delete" method="post">
                            {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger bottom" value="Delete"/>
                    </form>
                @endauth
            @else
                No post found.
            @endif
            <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/blog/posts</span><span class="text-white">$</span><span class="cursor">|</span></p>
        </div>
    </div>
@endsection
