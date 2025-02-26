module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}

// tailwind.config.js

module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/css/app.css',
    ],
    theme: {
        extend: {
            colors: {
                'f1-red': '#e10600',
                'f1-black': '#000000',
                'track-gray': '#333333',
            },
            fontFamily: {
                racing: ['Racing Sans One', 'cursive'],
                teko: ['Teko', 'sans-serif'],
            },
            animation: {
                'track-move': 'track-move 20s linear infinite',
            },
            keyframes: {
                trackMove: {
                    '0%': { transform: 'translate(0, 0)' },
                    '100%': { transform: 'translate(50%, 50%)' },
                }
            }
        },
    },
    plugins: [],
}
