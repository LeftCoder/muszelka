import { StatusDropdown, Status } from '@/types'

export const statuses = [
  {
    id: 1,
    name: Status.NEW,
  },
  {
    id: 2,
    name: Status.CONFIRMED,
  },
  {
    id: 3,
    name: Status.CANCELED,
  },
  {
    id: 4,
    name: Status.DONE,
  },
]

export const dropdown: StatusDropdown = [
  {
    id: '',
    name: 'Wszystkie',
  },
  ...statuses,
]
