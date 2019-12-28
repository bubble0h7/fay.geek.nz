@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="breadcrumbs text-left">
            <a href="{{ route('home') }}">cd ..</a>
        </div>
        <h1><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/files</span><span id="terminal-line" class="text-white">$</span></h1>
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
    <div class="row">
        <div class="col-7 offset-1">
            <p>
                total {{count($uploads)}}<br>
                @if (count($uploads) > 0)
                    @foreach ($uploads as $upload)
                        -rw-r--r-- 1 fay 197121 {{strlen($upload->name)}} @if(date("Y-m-d", strtotime("today")) == date("Y-m-d", strtotime($upload->updated_at))){{date("M  j   H:i", strtotime($upload->updated_at))}}@else{{date("M  j   Y", strtotime($upload->updated_at))}}@endif  <a href="{{$upload->file}}">{{substr($upload->file, strlen("/uploads/files/"))}}</a>
                        @auth
                         <a href="file/{{$upload->id}}/delete" class="delete">X</a>
                        @endauth
                        <br>
                    @endforeach
                @else
                    No files found.
                @endif
            </p>
            @auth
                <br><br>
                <form action="{{ route('file.create') }}" method="get">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="Upload File"/>
                </form>
                <br>
            @endauth
        </div>
        <div class="col-3 tags">
            <h2>Tags</h2>
            @if (isset($tags) && count($tags) > 0)
                @foreach ($tags as $tag)
                    {{$tag->id}}<br>
                @endforeach
            @else
                No tags found. <pre class="comment">// TODO</pre>
            @endif
        </div>
    </div>
@endsection
