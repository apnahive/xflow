Hi {{ $user->name }} {{ $user->lastname }},<br><br>

task has been assigned to you in  {{ $project->name }}. <a href="{{ route('projects.show', $project->id) }}">click here</a> to view details<br><br>


Thanks,<br>
