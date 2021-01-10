@extends('layout')
@section('title','Create')
@section('content')
    <form method="post" action="/project">
        @csrf
        <div class="field">
            <label for="title" class="lable">title</label>
            <div class="control">
                <input type="text" name="title" class="input {{$errors->has('title') ? 'is-danger':''}}" value="{{old('title')}}" required>
            </div>
        </div>
        <div class="field">
            <label for="desc" class="lable">Description</label>
            <div class="control">
                <textarea name="desc" class="textarea {{$errors->has('desc') ? 'is-danger':''}}" value="{{old('desc')}}" required></textarea>
            </div>
        </div>
        <div class="control">
            <input type="submit" class="button is-link" value="Create" >
        </div>
    </form>

    @include('errors')
@endsection

