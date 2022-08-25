@component('mail::message')
# Rent Reminder
 
Your rent bill is ready!
 
@component('mail::button', ['url' => 'link'])
Pay your rent
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent