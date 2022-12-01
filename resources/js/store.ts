import { defineStore } from 'pinia'
import { Apartment, PickedReservation, ReservationList } from '@/types'
import * as dayjs from 'dayjs'
import isBetween from 'dayjs/plugin/isBetween'
import customParseFormat from 'dayjs/plugin/customParseFormat'
dayjs.extend(isBetween)
dayjs.extend(customParseFormat)

interface State {
  apartments: Apartment[]
  reservation: PickedReservation
}

const isApartmentOccupied = (state: State, reservation: ReservationList) => {
  return (
    dayjs(dayjs(reservation.start).format('YYYY-MM-DD')).isBetween(
      dayjs(state.reservation.start, 'DD.MM.YYYY').format('YYYY-MM-DD'),
      dayjs(state.reservation.end, 'DD.MM.YYYY').format('YYYY-MM-DD'),
      'day',
      '[)'
    ) ||
    dayjs(dayjs(reservation.end).format('YYYY-MM-DD')).isBetween(
      dayjs(state.reservation.start, 'DD.MM.YYYY').format('YYYY-MM-DD'),
      dayjs(state.reservation.end, 'DD.MM.YYYY').format('YYYY-MM-DD'),
      'day',
      '(]'
    )
  )
}

export const useRootStore = defineStore('root', {
  state: (): State => ({
    apartments: [],
    reservation: {
      start: '',
      end: '',
      apartment_id: -1,
      adults: 2,
      children: 0,
      animals: false,
    },
  }),
  getters: {
    selectedDates: (state) => {
      if (state.reservation.start === '' || state.reservation.end === '') {
        return 'Nie wybrano'
      }
      return `od ${state.reservation.start} do ${state.reservation.end}`
    },
    selectedApartmentName: (state) => {
      const selected = state.apartments.find(
        (apartment) => apartment.id === state.reservation.apartment_id
      )
      return selected ? selected.name : ''
    },
    selectedApartmentMax: (state) => {
      const selected = state.apartments.find(
        (apartment) => apartment.id === state.reservation.apartment_id
      )
      return selected ? selected.max : null
    },
    guestsCout: (state) => {
      if (state.reservation.adults === 0 && state.reservation.children === 0) {
        return '<span class="text-red-500">Nie wybrano</span>'
      }
      if (state.reservation.adults === 0 && state.reservation.children > 0) {
        return '<span class="text-red-500">Wymagana przynajmniej jedna osoba dorosła</span>'
      }

      const selected = state.apartments.find(
        (apartment) => apartment.id === state.reservation.apartment_id
      )

      if (state.apartments && state.reservation.apartment_id !== -1) {
        if (
          selected &&
          state.reservation.adults + state.reservation.children > selected.max
        ) {
          return `<span class="text-red-500">Przekroczony maksymalny limit ${selected.max} osób</span>`
        }
      }
      const total = selected
        ? `<span class="text-sm font-light">/ ${selected.max} max.</span>`
        : ''
      return `${state.reservation.adults} + ${state.reservation.children} ${total}`
    },
    filterApartments: (state) => {
      let toFilter = state.apartments
      if (state.reservation.apartment_id !== -1) {
        toFilter = state.apartments.filter((apartment) => {
          return apartment.id === state.reservation.apartment_id
        })
      }

      return toFilter.filter((apartment) => {
        const userPickedDates =
          state.reservation.start && state.reservation.end ? true : false
        const weHaveReservations = apartment.reservation_list?.length ?? 0

        if (userPickedDates && weHaveReservations) {
          //check if any of the ongoing reservation overlaps with guest selected dates
          return apartment.reservation_list?.every((reservation) => {
            let occupied = isApartmentOccupied(state, reservation)
            //todo: consider reservation status
            return !occupied
          })
        }
        //there is no reservations for this apartment -> not ocuppied -> include
        return apartment
      })
    },
  },
  actions: {
    setApartments(apartments: Apartment[] | undefined) {
      if (apartments) {
        this.apartments = apartments
      } else {
        this.apartments = []
      }
    },
    resetApartment() {
      this.reservation.apartment_id = -1
    },
    setReservationDates(dates: { startDate: string; endDate: string }) {
      this.reservation.start = dates.startDate
      this.reservation.end = dates.endDate
    },
    resetReservationDates() {
      this.reservation.start = ''
      this.reservation.end = ''
    },
  },
})
