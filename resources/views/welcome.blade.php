@extends('layouts.app')

@section('content')

    <div class="col-12">
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~</span><span id="terminal-line" class="text-white">$</span></h1>
    </div>

    <div class="col-10 offset-1">
            <p>
                drwxr-xr-x 1 fay 197121      0 Dec 25 2019 <a href="{{ route('now') }}">now</a><br>
                @if (isset($project) && $project != null)
                    drwxr-xr-x 1 fay 197121      0 @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($project->updated_at))){{date("M  j   H:i", strtotime($project->updated_at))}}@else{{date("M  j   Y", strtotime($project->updated_at))}}@endif <a href="{{ route('projects') }}">projects</a><br>
                @endif
                @if (isset($post) && $post != null)
                    drwxr-xr-x 1 fay 197121      0 @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($post->updated_at))){{date("M  j   H:i", strtotime($post->updated_at))}}@else{{date("M  j   Y", strtotime($post->updated_at))}}@endif <a href="{{ route('blog') }}">blog</a><br>
                @endif
                @if (isset($file) && $file != null)
                    drwxr-xr-x 1 fay 197121      0 @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($file->updated_at))){{date("M  j   H:i", strtotime($file->updated_at))}}@else{{date("M  j   Y", strtotime($file->updated_at))}}@endif <a href="{{ route('files') }}">files</a><br>
                @endif
                drwxr-xr-x 1 fay 197121      0 Dec 25 2019 <a href="https://github.com/bubble0h7" target="_blank">git</a><br>
            </p>
    </div>
@endsection
