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
                // Add red palette extensions
                red: {
                    500: '#EF4444',
                    600: '#DC2626',
                    700: '#B91C1C',
                    800: '#991B1B',
                }
            },
            fontFamily: {
                racing: ['Racing Sans One', 'cursive'],
                teko: ['Teko', 'sans-serif'],
            },
            animation: {
                'track-move': 'track-move 20s linear infinite',
            },
            keyframes: {
                'track-move': {  // Fixed keyframe name to match animation
                    '0%': { transform: 'translate(0, 0)' },
                    '100%': { transform: 'translate(50%, 50%)' },
                }
            },
            gradientColorStops: theme => ({
                ...theme('colors'),
                'red-600': '#DC2626',
                'red-700': '#B91C1C',
                'red-800': '#991B1B',
            }),
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
            gradientColorStops: ['active', 'hover'],
            transform: ['hover'],
            scale: ['hover'],
            transitionProperty: ['hover'],
        }
    },
    plugins: [
        require('@tailwindcss/ui'),
    ],
};
