@component('mail::message')
Hi {{ $data->name }}!
<br />
Thanks for applying for a awn medical account.
<br />
Please confirm your email address to complete your application.
<br />
Confirm your email
<br />
@component('mail::button', ['url' => url('/active/'.$data->active)])
Activate Your Account
@endcomponent
<br />
<h3>Or Active Your Account By Click</h3>
<br />
{{ url('/active/'.$data->active) }}
<br /><br />
Thanks,<br>
{{ config('app.name') }}
@endcomponent
