module.exports = {
  mode: 'jit',
  purge: [
    './app/Views/**/*.php',
    './app/Views/**/*.html'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/line-clamp'),
  ],
}
