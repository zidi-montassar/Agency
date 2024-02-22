<x-mail::message>
# New contact request

A new contact request has been sent for the property <a href="{{ route('property.show', ['slug' => $property->slug(), 'property' => $property]) }}">{{ $property->title }}</a>.

- First name: {{ $data['fname'] }}
- Last name: {{ $data['lname'] }}
- Phone number: {{ $data['phone'] }}
- Mail adress: {{ $data['mail'] }}


** Message: ** <br>
{{ $data['message'] }} 
</x-mail::message>
