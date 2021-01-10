@extends('layout')
@section('title','Projects')
@section('content')
    <h1 class="box">Projects</h1>
    @if($projects->count())
    <div class="box">
    <ul>
        @foreach($projects as $project)
            <li>
              <a href="/project/{{ $project->id }}" class="button"> {{ $project->title }}</a>
            </li>
        @endforeach
    </ul>
    </div>
    @endif
@endsection
