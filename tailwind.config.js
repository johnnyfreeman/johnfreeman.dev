const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  content: [
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
        gray: colors.gray,
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
  plugins: []
}
