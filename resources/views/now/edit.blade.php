@extends('layouts.admin')

@section('content')
    <div class="col-12">
        <h1>Edit Now Entry</h1>
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

        <form action="update" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="age">Age</label>
                <input id="age" type="text" class="form-control" name="age" value="@if(isset($now->age)){{$now->age}}@endif">
            </div><br>
            <div class="row">
                <label for="sex">Sex</label>
                <input id="sex" type="text" class="form-control" name="sex" value="@if(isset($now->sex)){{$now->sex}}@endif">
            </div><br>
            <div class="row">
                <label for="location">Location</label>
                <input id="location" type="text" class="form-control" name="location" value="@if(isset($now->location)){{$now->location}}@endif">
            </div><br>
            <div class="row">
                <label for="occupation">Occupation</label>
                <input id="occupation" type="text" class="form-control" name="occupation" value="@if(isset($now->occupation)){{$now->occupation}}@endif">
            </div><br>
            <div class="row">
                <label for="listening_to">Listening To</label>
                <input id="listening_to" type="text" class="form-control" name="listening_to" value="@if(isset($now->listening_to)){{$now->listening_to}}@endif">
            </div><br>
            <div class="row">
                <label for="watching">Watching</label>
                <input id="watching" type="text" class="form-control" name="watching" value="@if(isset($now->watching)){{$now->watching}}@endif">
            </div><br>
            <div class="row">
                <label for="playing">Playing</label>
                <input id="playing" type="text" class="form-control" name="playing" value="@if(isset($now->playing)){{$now->playing}}@endif">
            </div><br>
            <div class="row">
                <label for="reading">Reading</label>
                <input id="reading" type="text" class="form-control" name="reading" value="@if(isset($now->reading)){{$now->reading}}@endif">
            </div>
    </div>
    <div class="col-10 offset-1">
            <div class="row">
                <label for="excited_about">Excited About <span title="New Line Seperated Values">(NLSV)</span></label><br>
                <textarea id="excited_about" type="text" class="form-control" name="excited_about">@if(isset($now->excited_about)){{$now->excited_about}}@endif</textarea>
            </div><br>
            <div class="row">
                <label for="working_on">Working On <span title="New Line Seperated Values">(NLSV)</span></label><br>
                <textarea id="working_on" type="text" class="form-control" name="working_on">@if(isset($now->working_on)){{$now->working_on}}@endif</textarea>
            </div><br>
            <div class="row">
                <button type="submit" class="btn btn-success bottom">Save</button>
            </div>
        </form>
    </div>
@endsection
