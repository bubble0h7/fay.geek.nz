@extends('layouts.app')

@section('content')
    <div class="col-12">
            <h2>Admin Access</h2>
            <br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <a href="{{ route('projects') }}">Go to Projects</a><br>
    </div>
@endsection
