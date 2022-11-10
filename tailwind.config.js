/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'xsm': '400px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      'hdtv': '1450px',
      '2xl': '1536px',      
      'almostfullhd': '1800px',
      'fullhd': '1920px',
      'afterfullhd': '1921px'
    },
    extend: {
      boxShadow: {
        'bootstrap': 'rgba(0, 0, 0, 0.15) 0px 0.5rem 1rem',
      },
      colors: {
        'coolgray': '#dee2e6',
      }
    },
  },
  plugins: [],
}

