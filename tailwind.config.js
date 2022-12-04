import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'

/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: ['class'],
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './node_modules/vue-tailwind-datepicker/**/*.js',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      colors: {
        'vtd-primary': colors.amber,
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        sign: ['"Pacifico", handwriting'],
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
}
