export interface Reservation {
  id: number
  number: string
  name: string
  surname: string
  email: string
  phone: string
  start: string
  end: string
  days: number
  adults: number
  children: number
  animals: boolean
  status: ReservationStatus
  apartment: Pick<Apartment, 'id' | 'name'>
}

export type PickedReservation = Pick<
  Reservation,
  'start' | 'end' | 'adults' | 'children' | 'animals'
> & { apartment_id: number }
export type ReservationList = Pick<
  Reservation,
  'id' | 'start' | 'end' | 'status'
>
export type LastReservation = Pick<Reservation, 'id' | 'name' | 'surname'>

export type ReservationStatus =
  | Status.NEW
  | Status.CONFIRMED
  | Status.CANCELED
  | Status.DONE

export type DropdownList = {
  id: string | number
  name: ReservationStatus | 'Wszystkie'
}[]

export enum Status {
  NEW = 'Nowa',
  CONFIRMED = 'Potwierdzona',
  CANCELED = 'Anulowana',
  DONE = 'Zakończona',
}

export interface Apartment {
  id: number
  name: string
  description: string
  price: number
  max: number
  occupied: boolean
  features?: Feature[]
  images?: Image[]
  last_reservation?: LastReservation
  reservation_list?: ReservationList[]
}

export interface Feature {
  id: number
  name: string
}

export interface Image {
  id: number
  src: string
  thumbnail: string
  width: number
  height: number
  alt: string
}

export interface Faq {
  id: number
  question: string
  answer: string
}

export interface PaginationLinks {
  first: string
  last: string
  next: string
  prev: string | null
}

export interface MetaInformations {
  current_page: number
  from: number
  last_page: number
  links: MetaLink[]
  path: string
  per_page: number
  to: number
  total: number
}

export interface MetaLink {
  active: boolean
  label: string
  url: string | null
}

export type Toast = (text: string) => void
