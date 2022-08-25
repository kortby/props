@component('mail::message')
# Rent Reminder
 
Dear tenant, It's almost time to renew your lease. I appreciate you as a tenant and want to continue having you as a resident. Thank you so much for paying your rent on time every month and taking such great care of the property.
 
@component('mail::button', ['url' => 'link'])
Renew your lease
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent