@component('mail::message')
# Reset Account
Welcome {{ $data['admin']->name }}

@component('mail::button', ['url' => aurl('reset_password_final/'.$data['token'])])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
