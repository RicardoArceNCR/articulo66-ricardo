/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Raleway', 'sans-serif'],
      },
      colors: {
        'primary': '#0066CC',
      }
    },
  },
  plugins: [],
} 