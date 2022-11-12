import { defineStore } from 'pinia'
import { Apartment } from '@/types'

export const useRootStore = defineStore('root', {
  state: () => ({
    questions: [
      {
        id: 1,
        body: 'What Would You Rather Throw Away: Love Or Money?',
        answer:
          'Nunc vitae augue luctus, consequat risus eu, ultrices urna. Etiam volutpat, lectus non vehicula maximus, mauris nunc sagittis erat, in porttitor magna felis et orci. Sed euismod eget nisi posuere pulvinar.',
      },
      {
        id: 2,
        body: 'What’s The Most Beautiful Place You’ve Ever Seen?',
        answer:
          'Donec quis eleifend neque. Maecenas ut purus vestibulum, ultrices erat id, sollicitudin arcu. Integer viverra aliquam lacus ac eleifend. Aenean sed tellus facilisis, ultricies sem ut, ullamcorper lectus.',
      },
      {
        id: 3,
        body: 'What’s The Funniest Way You’ve Ever Broken The Law?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis commodo justo. Proin non magna et risus accumsan malesuada faucibus sit amet nunc. Integer placerat gravida ligula quis dictum. Nunc vitae augue luctus, consequat risus eu, ultrices urna.',
      },
      {
        id: 4,
        body: 'If Your Food Is Bad At A Restaurant, Would You Say Something?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 5,
        body: 'If You Had The World’s Attention For 30 Seconds, What Would You Say?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 6,
        body: 'If You Were To Name Your Own Song, What Would You Name It?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 7,
        body: 'If You Were Invited To Attend Hogwarts, Which Hogwarts House Would You Choose?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 8,
        body: 'If you decided to run for President, what would your campaign slogan be?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 9,
        body: 'What is your favourite team game to play?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
      {
        id: 10,
        body: 'What’s The Strangest Thing That You’ve Ever Fallen In Love With?',
        answer:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices, mauris non congue faucibus, elit neque venenatis urna, vel lobortis ex turpis quis velit. Sed dignissim in sapien id imperdiet. Donec consectetur nisl sit amet mi congue, ut imperdiet nisi cursus. Nulla rutrum hendrerit nisl, eu ornare purus dictum sit amet. Phasellus ultricies lacinia vehicula.',
      },
    ],
    apartments: [] as Apartment[],
    reservation: {
      start: '',
      end: '',
      apartment_id: -1,
      adults: 2,
      children: 0,
      animals: false
    },
  }),
  getters: {
    selectedDates: (state) => {
      if (
        state.reservation.start === '' ||
        state.reservation.end === ''
      ) {
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
        return 'Nie wybrano'
      }
      if (state.reservation.adults === 0 && state.reservation.children > 0) {
        return 'Wymagana przynajmniej jedna osoba dorosła'
      }

      if (state.apartments && state.reservation.apartment_id !== -1) {
        const selected = state.apartments.find(
          (apartment) => apartment.id === state.reservation.apartment_id
        )

        if (selected && ((state.reservation.adults + state.reservation.children) > selected.max)) {
          return `Przekroczony maksymalny limit ${selected.max} osób`
        }
      }

      return `${state.reservation.adults} + ${state.reservation.children}`
    },
    filterApartments: (state) => {
      if (state.reservation.apartment_id === -1) {
        return state.apartments
      }
      return state.apartments.filter(
        (apartment) => apartment.id === state.reservation.apartment_id
      )
    },
  },
  actions: {
    setApartments(apartments: Apartment[] | undefined) {
      if(apartments) {
        this.apartments = apartments
      } else {
        this.apartments = []
      }
    },
    updateReservationDates(dates: {startDate: string; endDate: string;}) {
      this.reservation.start = dates.startDate
      this.reservation.end = dates.endDate
    },
    resetApartment() {
      this.reservation.apartment_id = -1
    },
  },
})
