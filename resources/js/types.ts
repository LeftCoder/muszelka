export interface Reservation {
  id: number
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
  confirmed: boolean
  apartment_id: boolean
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
  last_reservation?: Reservation
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

export interface Question {
  id: number
  body: string
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

export interface Question {
  id: number
  body: string
  answer: string
}
