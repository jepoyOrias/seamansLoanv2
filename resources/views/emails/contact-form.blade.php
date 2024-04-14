@component('mail::message')
# Contact Form Submission

You have received a new contact form submission:

**Name:** {{ $formData['name'] }}  
**Email:** {{ $formData['email'] }}  
**Phone:** {{ $formData['phone'] }}  
**Message:**  
{{ $formData['message'] }}

Thank you.

@endcomponent