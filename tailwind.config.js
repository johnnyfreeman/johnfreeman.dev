module.exports = {
  theme: {
    extend: {
        screens: {
            light: { raw: '(prefers-color-scheme: light)' },
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
