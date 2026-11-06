/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        heading: ['"Playfair Display"', 'serif'],
        body: ['Lato', 'sans-serif'],
      },
      colors: {
        cream: '#f5efe6',
        gold: '#c9a96e',
        teal: '#2d6a6a',
        deepteal: '#1e4d4d',
        textbrown: '#3a2e2e',
        brandpink: '#e91e8c',
      },
      boxShadow: {
        soft: '0 18px 50px rgba(45, 48, 56, 0.15)',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-8px)' },
        },
      },
      animation: {
        float: 'float 3s ease-in-out infinite',
      },
    },
  },
  plugins: [],
};
