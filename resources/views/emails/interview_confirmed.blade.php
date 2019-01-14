Hello {{ $job->client_name }},<br><br>

Your invitation for the {{ $job->title }} has been confirmed by {{ $user->name }} {{ $user->lastname }}. Please open the following link <a href="{{ route('profiles.show', $user->id) }}">Link</a> to view candidate profile. <br><br>

Thanks,<br>
