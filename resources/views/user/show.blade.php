@extends('layout')
@section('title','Show')
@section('content')
    <div class="box">
        Project:   <b>{{$project->title}}</b>
        <p class="is-medium"> Description : {{ $project->desc }}</p>
    </div>
    <div class="box">
        <h1> {{ $project->title }} </h1>
      <a href="/project/{{$project->id}}/edit" class="button is-link"><b>Edit</b></a>
    </div>
{{--@if ($project->tasks->count())--}}
{{--    <div class="box">--}}
{{--         @foreach ($project->tasks as $task)--}}
{{--             <div class="control">--}}
{{--                 <form method="post" action="/tasks/{{$task->id}}" >--}}
{{--                     @csrf--}}
{{--                     @method('PATCH')--}}
{{--                     <label for="completed " class="checkbox {{$task->completed ? 'is-complete' : ''}} ">--}}
{{--                     <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}} >--}}
{{--                     {{$task->description}}--}}
{{--                     </label>--}}
{{--                 </form>--}}
{{--             </div>--}}

{{--        @endforeach--}}

{{--    </div>--}}
{{--@endif--}}
@if($project->tasks->count())
    <div class="box">
        @foreach($project->tasks as $task)
              <form action="/tasks/{{$task->id}}" method="post">
                  @csrf
                  @method('PATCH')
                 <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                    <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()" >  {{  $task->description}}
                 </label>
              </form>
        @endforeach
    </div>
@endif
 <form action="/project/{{ $project->id }}/tasks" method="post" class="box">
     @csrf
     <div class="field">
         <label for="description" class="label">Add Task</label>
            <div class="control">
                <input type="text" class="input" name="description" required >
            </div>
     </div>
     <div class="control">
         <button type="submit" class="button is-full">ADD TASK</button>
     </div>
 </form>
 @if($project->tasks->count())
     <form action="/tasks/{{$task->id}}" method="post" class="box is-delete">
         @method('DELETE')
         @csrf
         <div class="field">
             <div class="control">
                 <button type="submit" class="button is-full"> delete</button>
             </div>
         </div>
     </form>

 @endif
 @include('errors')
@endsection


