Hello {{ $user->name }},<br><br>

Please open the following link to sign the document <a href="{{ route('form_sign.show', $form) }}">Link</a><br><br>

Thanks,<br>
