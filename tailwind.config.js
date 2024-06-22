/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    extend: {
        colors: {

            'nav': '#000814',
            'blufoncer': '#001D3D',
            'bluclaire': '#003566',
            'jaunef': '#ffc300',
            'joune': '#ffd60a',
          },
    },

  },
  plugins: [

  ],



}

