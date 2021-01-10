@extends('layout')
@section('title','Edit')
@section('content')
    <h1 class="container">{{$project->title}}</h1>

    <form method="post" action="/project/{{$project->id}}">
        @csrf
        @method('PATCH')
        <div class="field">
            <label for="title" class="lable">title</label>
            <div class="control">
                <input type="text" name="title" class="input {{$errors->has('title')? 'is-danger':''}}" value="{{$project->title}}" required>
            </div>
        </div>
        <div class="field">
            <label for="desc" class="lable">Description</label>
            <div class="control">
                <textarea name="desc" class="textarea {{ $errors->has('desc')? 'is-danger':''}}" required> {{$project->desc}}"</textarea>
            </div>
        </div>
        <div class="control">
            <input type="submit" class="button is-link" value="Update" >
        </div>
    </form>
    @include('errors')
    <form action="/project/{{$project->id}}" method="post">
        @method('DELETE')
        @csrf
        <div class="control">
            <input type="submit" class="button is-link" value="DELETE"  >
        </div>
    </form>


@endsection
