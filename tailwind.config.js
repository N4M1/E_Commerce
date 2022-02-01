module.exports = {
  content: ["./templates/**/*.{html,js,html.php}"],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/aspect-radio'),
      require('@tailwindcss/typography'),
  ],
}
