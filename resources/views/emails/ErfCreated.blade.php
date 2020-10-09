@component('mail::message')
# Hi, this ERF needs your review.

**Title:** {{$erf->title}} <br>
**Company:** {{$erf->company}} <br>
**Job Title:** {{$erf->job_title}} <br>

@component('mail::button', ['url' => env('FRONTEND_URL').'/review-erf'.'/'.$erf->hashed])
Review Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent