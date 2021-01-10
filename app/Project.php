<?php

namespace App;

use App\Events\ProjectCreatedEvent;
use Illuminate\Database\Eloquent\Model;
use App\Mail\CreatedProject;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Parent_;

class Project extends Model
{
    protected $guarded=[];

//    public static function boot()
//    {
//      Parent::boot();
//      static::created(function($project)
//      {
//        Mail::to($project->owner->email)->send(
//            new CreatedProject($project)
//        );
//      });
//
//    }
        protected $dispatchesEvents=[
            'created'=>ProjectCreatedEvent::class,
        ];

    public function owner()
    {
       return $this->belongsTo(User::class);
    }

    public function tasks()
    {

       return $this->hasMany(Task::class);

    }

     public  function addTask($task)
     {

         $this->tasks()->create($task);

     }
}
