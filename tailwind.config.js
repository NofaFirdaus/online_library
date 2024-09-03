/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily:{
            'poppins':["Poppins", "sans-serif"]
          },
          spacing: {
            '72': '18rem',
            '84': '21rem',
            '96': '24rem',
          },
      },
    },
    plugins: [],
  }
