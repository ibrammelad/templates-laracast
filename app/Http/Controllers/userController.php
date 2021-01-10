<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreatedEvent;
use App\Mail\CreatedProject;
use App\Project;
use App\Services\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
        public  function __construct()
        {

            $this->middleware('auth');

        }

        public function index()
        {

            //$projects =Project::where('owner_id' , auth()->id())->get();

            //$projects = auth()->user()->projects;

            return view('user.index',[

                'projects' => auth()->user()->Userhasprojects

            ]);

        }
        public function create()
        {

            return view('user.create');

        }
        public function store()
        {
    //
    //        $validate = \request()->validate([
    //            'title'=> ['required' , 'min:3','max:30'],
    //            'desc'=> ['required' , 'min:4']
    //        ]);
            $validate =$this->validateProject();

            $validate['owner_id']= auth()->id();

            $project =Project::create($validate);

            //event(new ProjectCreatedEvent($project));
            return redirect('/project');

        }

        public function show(Project $project )
        {

    // ok       if($project->owner_id !== auth()->id())
    //        {
    //            abort(403);
    //        }
    // ok      abort_if($project->owner_id !== auth()->id(),403);
    // ok         abort_if(!auth()->user()->owns($project),403);

            $this->authorize('update',$project);

            return view('user.show', compact('project'));

        }

        public function edit(Project $project)
        {

            $this->authorize('update',$project);

            return view('user.edit' , compact('project'));

        }

        public function update(Project $project)
        {

            $project->update($this->validateProject());

            return redirect('/project');

        }

        public function destroy(Project $project)
        {
            $project->delete();

            return redirect('/project');

        }
        public  function validateProject()
        {
            return \request()->validate([
                'title'=> ['required' , 'min:3','max:30'],
                'desc'=> ['required' , 'min:4']
            ]);

        }

}
