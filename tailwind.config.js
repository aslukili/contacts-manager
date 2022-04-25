module.exports = {
  content: ["./public/**/*.{html,js,php}"],
  theme: {
    extend: {
      backgroundImage: {
        'contacts' : "linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/asset/imgs/contacts.jpg')",
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}