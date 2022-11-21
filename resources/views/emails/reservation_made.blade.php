<x-mail::message>
# Hej, Michał!

<x-mail::panel>
Właśnie pojawiła się nowa rezerwacja.
</x-mail::panel>

<x-mail::table>
|                            |                                                                                          |
| :------------------------- | :--------------------------------------------------------------------------------------- |
| **Nr rezerwacji**          | {{ $reservation->number }}                                                               |
| **Osoba rezerwująca**      | {{ $reservation->name }} {{ $reservation->surname }}                                     |
| **Domek**                  | {{ $reservation->apartment->name }}                                                         |
| **Liczba gości**           | {{ $reservation->adults }} dorosłych, {{ $reservation->children }} dzieci                |
| **Data pobytu**            | od {{ $reservation->start->format('d.m.Y') }} do {{$reservation->end->format('d.m.Y') }} |
</x-mail::table>

<x-mail::button url="{{ url('/dashboard/rezerwacje') }}">
Zobacz wszystkie rezerwacje
</x-mail::button>

</x-mail::message>