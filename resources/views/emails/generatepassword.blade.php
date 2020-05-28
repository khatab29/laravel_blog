@component('mail::message')
# Hallo {{ $admin->name}} .

Your Random Admin Password Is {{bcrypt($admin->password) }} .



Thanks,<br>
{{ config('app.name') }}
@endcomponent
