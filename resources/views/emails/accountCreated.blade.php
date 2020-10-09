@component('mail::message')
# Hi {{$user->name}}

Congratulations! If you can see this email, your account has been
created and you can access to our Recruitment Management System!
<br>
<br>
**Name:** {{$user->name}} <br>
**Email:** {{$user->email}} <br>
**Default Password:** ***aryanoble*** <br>

@component('mail::button', ['url' => env('FRONTEND_URL').'/login'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent