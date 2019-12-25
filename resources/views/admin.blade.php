@extends('layouts.admin')

@section('content')
    <div class="col-12">
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <a href="{{ route('projects') }}">Go to Projects</a><br>
    </div>
@endsection
