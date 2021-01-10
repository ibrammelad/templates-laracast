<?php

namespace App\Mail;

use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreatedProject extends Mailable
{
    use Queueable, SerializesModels;

    public $project ;


    public function __construct($project)
    {
        $this->project = $project ;
    }


    public function build()
    {
        return $this->markdown('Created_Project_view');
    }
}
