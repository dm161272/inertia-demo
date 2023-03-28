
module.exports = {
  content: [ './resources/**/*.php', './resources/**/*.vue', './resources/**/*.jsx', ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {

      colors: {
        primary: '#1a202c', // Dark gray
        secondary: '#e2e8f0', // Light gray
      },

    },
  },
  variants: {
    extend: {},
  },
  plugins: [

    require('@tailwindcss/forms'),

  ],
}
