@component('mail::message')

# new project {{  $project->title  }}

   {{   $project->desc  }}

@component('mail::button', ['url' => url('/project/'.$project->id)])
 project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
