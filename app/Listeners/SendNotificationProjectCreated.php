<?php

namespace App\Listeners;

use App\Events\ProjectCreatedEvent;
use App\Mail\CreatedProject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationProjectCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreatedEvent  $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        return Mail::to($event->project->owner->email)->send(
            new CreatedProject($event->project)
        );
    }
}
