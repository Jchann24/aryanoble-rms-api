@component('mail::message')
# Hello!

You have an updated information! <br>
If you can see this email, **login** to your account to check our update for you! <br>

@component('mail::button', ['url' => env('FRONTEND_URL')])
Login for more details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent