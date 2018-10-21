Hello {{ $user->name }} {{ $user->lastname }},<br><br>

You have been assigned to {{ $project->name }} as @if($project->poc == $user->id) Consultant @elseif($project->cco == $user->id) CCO @endif . To open project <a href="{{ route('projects.show', $project->id) }}">click here</a><br><br>

Thanks,<br>
