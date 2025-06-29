/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.{php,vue,js}',
  ],
  theme: {
    extend: {
      colors: {
        'grey-1': '#F4F9FC',
        'grey-2': '#E7E7E7',
        'dark-100': '#5D5D5D',
        'dark-50': '#333333',
        blue:      '#1D447A',
        'green-100':'#0A95A6',
        'green-50': '#1BC6EB',
      },
      fontFamily: {
        sans: ['Raleway', 'sans-serif'],
        acumin: ['"Acumin Variable Concept"', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
