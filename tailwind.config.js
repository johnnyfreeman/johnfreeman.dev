const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './resources/css/**/*.css',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/js/**/*.vue',
    './app/View/Components/**/*.php',
    './vendor/laravel/**/*.blade.php',
  ],
  theme: {
    extend: {
      screens: {
        light: { raw: '(prefers-color-scheme: light)' },
      },
      colors: {
        gray: colors.coolGray,
        orange: colors.orange,
        teal: colors.teal,
        indigo: colors.indigo,
        blue: colors.blue,
      },
    },
    fontFamily: {
        'mono': ['"Source Code Pro"'],
    },
  },
  variants: {
    display: ['responsive', 'group-hover'],
  },
  plugins: []
}
