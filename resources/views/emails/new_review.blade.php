<x-mail::message>

<x-mail::panel>
# {{ $details['author'] }}
{{ $details['body'] }}
</x-mail::panel>


<x-mail::button url="{{ url('/dashboard/opinie') }}">
Pokaż wszystkie opinie
</x-mail::button>

</x-mail::message>