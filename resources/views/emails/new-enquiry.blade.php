<x-mail::message>
# New Enquiry Received

**Source:** {{ $enquiry->source === 'home_quick' ? 'Homepage quick form' : 'Contact page form' }}

**Name:** {{ trim($enquiry->first_name.' '.$enquiry->last_name) }}
@if ($enquiry->company)
**Company:** {{ $enquiry->company }}
@endif
**Email:** {{ $enquiry->email }}
@if ($enquiry->phone)
**Phone:** {{ $enquiry->phone }}
@endif
@if ($enquiry->equipment_type)
**Equipment Type:** {{ $enquiry->equipment_type }}
@endif
@if ($enquiry->application_types)
**Type of Application:** {{ implode(', ', $enquiry->application_types) }}
@endif
@if ($enquiry->message)

**Message:**

{{ $enquiry->message }}
@endif

<x-mail::button :url="route('admin.dashboard')">
View in Admin
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
