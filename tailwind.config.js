module.exports = {
  content: [
    './assets/**/*.{css,js,html}',
  ],
  theme: {
    extend: {
      screens: {
        light: { raw: '(prefers-color-scheme: light)' },
      },
    },
    boxShadow: {
      sm: '1px 1px 0px rgb(0 0 0 / 0.03)',
      DEFAULT: '2px 2px 0px rgb(0 0 0 / 0.03)',
      // DEFAULT: '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
      md: '4px 4px 0px rgb(0 0 0 / 0.03)',
      lg: '6px 6px 0px rgb(0 0 0 / 0.03)',
      xl: '8px 8px 0px rgb(0 0 0 / 0.03)',
      '2xl': '10px 10px 0px rgb(0 0 0 / 0.03)',
      inner: 'inset 2px 2px 0px rgb(0 0 0 / 0.03)',
      none: 'none',
    },
    fontFamily: {
      'mono': ['"Source Code Pro"'],
    },
  },
  plugins: [
    require('tailwind-dracula')(),
  ]
}
