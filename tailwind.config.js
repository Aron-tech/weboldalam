/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily: {
            'opensans': ['"Open Sans"', 'sans-serif'],
            'frankruhl': ['"Frank Ruhl Libre"', 'serif'],
            'robotoslab': ['"Roboto Slab"', 'serif'],
          },
        colors: {
          'primary': '#3c8acf',
          'bg-color': '#F4F4F4',
        }
      },
    },
    plugins: [],
  }
