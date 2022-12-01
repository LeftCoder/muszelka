<x-mail::message>
# Hej, {{ $reservation->name }}!

<x-mail::panel>
Twoja rezerwacja została przyjęta. Prosimy o jej potwierdzenie.
Link do potwierdzenia jest **aktywny przez 24 godziny**.
</x-mail::panel>

<x-mail::table>
|                            |                                                                                          |
| :------------------------- | :--------------------------------------------------------------------------------------- |
| **Nr rezerwacji**          | {{ $reservation->number }}                                                               |
| **Osoba rezerwująca**      | {{ $reservation->name }} {{ $reservation->surname }}                                     |
| **Domek**                  | {{ $reservation->apartment->name }}                                                      |
| **Liczba gości**           | {{ $reservation->adults + $reservation->children }}                                      |
| **Zwierzęta**              | {{ $reservation->animals ? 'Tak' : 'Nie' }}                                              |
| **Data pobytu**            | od {{ $reservation->start->format('d.m.Y') }} do {{$reservation->end->format('d.m.Y') }} |
</x-mail::table>

<x-mail::button url="{{ url('/success/'.$token->token) }}" color="success">
Potwierdź rezerwację
</x-mail::button>

Pozdrawiamy,<br>
właściciele Muszelki
</x-mail::message>