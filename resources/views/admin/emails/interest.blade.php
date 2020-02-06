@component('mail::message')
Hi {{ $data['name'] ?? "" }}!
<br />
A new medical device has been added from the Medical Aid website in one of your interests
<br />
@component('mail::button', ['url' => url('/prod/show/'.$data['product_id'] ?? "")])
See Now
@endcomponent
<br /><br />
Thanks,<br>
{{ config('app.name') }}
@endcomponent
