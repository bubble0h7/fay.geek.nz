@extends('layouts.app')

@section('content')
    <div class="breadcrumbs text-left">
        <a href="{{ route('home') }}">cd ..</a>
    </div>
    <div class="col-12 terminal-window">
        
        <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/files</span><span id="terminal-line" class="text-white">$</span></p>
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
                    <input type="submit" class="btn btn-primary bottom" value="Upload File"/>
                </form>
                <br>
            @endauth
            <p><span class="text-yellow">fay@toothless</span><span class="text-white">:</span><span class="text-blue">~/files</span><span class="text-white">$</span><span class="cursor">|</span></p>
        </div>
    </div>
@endsection
