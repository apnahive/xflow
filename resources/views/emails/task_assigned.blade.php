Hi {{ $user->name }} {{ $user->lastname }},<br><br>

task has been assigned to you in  {{ $project->projectname }}. <a href="{{ route('tasks.show', $project->id) }}">click here</a> to view details<br><br>


Thanks,<br> 
