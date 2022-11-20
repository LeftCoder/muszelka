<x-mail::message>
# Hej {{ $reservation->name }}!

<x-mail::panel>
Twoja rezerwacja została przyjęta. Prosimy o jej potwierdzenie.
</x-mail::panel>

<x-mail::table>
|                            |                                                                                          |
| :------------------------- | :--------------------------------------------------------------------------------------- |
| **Nr rezerwacji**          | {{ $reservation->number }}                                                               |
| **Osoba rezerwująca**      | {{ $reservation->name }} {{ $reservation->surname }}                                     |
| **Domek**                  | {{ $reservation->apartment_id }}                                                         |
| **Liczba gości**           | {{ $reservation->adults + $reservation->children }}                                      |
| **Data pobytu**            | od {{ $reservation->start->format('d.m.Y') }} do {{$reservation->end->format('d.m.Y') }} |
</x-mail::table>

<x-mail::button url="{{ url('/success/'.$token->token) }}" color="success">
Potwierdź rezerwację
</x-mail::button>

Pozdrawiamy,<br>
właściciele Muszelki
</x-mail::message>