<?php

namespace App\Http\Controllers;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TasksProjectController extends Controller
{
    public  function store(Project $project)
    {
        $validate = \request()->validate([
            'description'=> ['required','min:3']
        ]);
        $project->addTask($validate);
//        Task::create([
//            'project_id'=> $project->id,
//            'description' => \request('description'),
//        ]);
        return back();
    }
    public  function update(Task $task)
    {
//        if(\request()->has('completed'))
//            $task->complete();
//        else
//            $task->incomplete();
//        $task->update([
//            'completed' => \request()->has('completed')
//        ]);
        \request()->has('completed')?$task->complete():$task->incomplete();
        return back();
    }
    public function destroy(Task $task)
    {
        $task->remove(\request()->has('id'));
        return back();
    }
}
