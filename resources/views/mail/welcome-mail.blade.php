<x-mail::message>
# Welcome Mail

I would like to thank you for contacting with us.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
