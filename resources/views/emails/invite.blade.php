Hello {{ $user->name }} {{ $user->lastname }},<br><br>

You have been invited for the {{ $job->title }}. Please open the following link <a href="{{ route('interviewed.show', $job->id) }}">Link</a> to learn more. <br><br>

Thanks,<br>
