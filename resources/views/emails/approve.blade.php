Hello Admin,<br><br>

{{ $user->name }} {{ $user->lastname }} has been registered. Please open the following link <a href="{{ route('users.show', $user->id) }}">Link</a> approve/reject user. <br><br>

Thanks,<br>
