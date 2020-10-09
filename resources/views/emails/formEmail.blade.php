@component('mail::message')
# Hello!

You Received a **Form Attachment**! <br>
If you can see this email, please download the attachment provided! <br>

@component('mail::button', ['url' => env('FRONTEND_URL')])
Login for more details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent