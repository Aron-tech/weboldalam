/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.html',
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
          'light-gray': '#F4F4F4',
        },
        animation: {
            bounceCustom: "bounceCustom 0.9s linear infinite",
            spinCustom: "spinCustom 2s linear infinite",
          },
          keyframes: {
            bounceCustom: {
              "0%": { transform: "translateY(0)" },
              "100%": { transform: "translateY(20px)" },
            },
            spinCustom: {
              "0%": { transform: "rotate(0deg)" },
              "100%": { transform: "rotate(360deg)" },
            },
          },
          animation: {
            'fade': 'fade 1s ease-in-out',
            'slide-left': 'slideLeft 1s ease-in-out',
            'slide-right': 'slideRight 1s ease-in-out',
            'zoom': 'zoom 1s ease-in-out',
            'rotate': 'rotate 1s ease-in-out',
            'flip': 'flip 1s ease-in-out',
          },
          keyframes: {
            fade: {
              '0%': { opacity: 0 },
              '100%': { opacity: 1 },
            },
            slideLeft: {
              '0%': { transform: 'translateX(100%)' },
              '100%': { transform: 'translateX(0)' },
            },
            slideRight: {
              '0%': { transform: 'translateX(-100%)' },
              '100%': { transform: 'translateX(0)' },
            },
            zoom: {
              '0%': { transform: 'scale(0.5)' },
              '100%': { transform: 'scale(1)' },
            },
            rotate: {
              '0%': { transform: 'rotate(0deg)' },
              '100%': { transform: 'rotate(360deg)' },
            },
            flip: {
              '0%': { transform: 'rotateY(0deg)' },
              '100%': { transform: 'rotateY(360deg)' },
            },
          },
      },
    },
    plugins: [
        require('@tailwindcss/typography'),
      ],
  }
