import type { ReservationStatus, StatusDropdown } from '@/types'

export const statuses: { id: number; name: ReservationStatus }[] = [
  {
    id: 1,
    name: 'Nowa',
  },
  {
    id: 2,
    name: 'Potwierdzona',
  },
  {
    id: 3,
    name: 'Anulowana',
  },
  {
    id: 4,
    name: 'Zakończona',
  },
]

export const dropdown: StatusDropdown = [
  {
    id: '',
    name: 'Wszystkie',
  },
  ...statuses,
]
