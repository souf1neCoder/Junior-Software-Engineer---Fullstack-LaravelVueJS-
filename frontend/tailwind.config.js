/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js}",
  ],
  theme: {
    extend: {
      colors:{
        'primary':'#B83375',
        'dark':'#333333'
      }
    },
  },
  plugins: [],
}

