import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-primary': '#0f172a',
                'dark-secondary': '#111827',
                'accent': '#4f46e5',
                'accent-hover': '#6366f1',
                'primary': '#4361ee',
                'secondary': '#3f37c9',
                'accent': '#4895ef',


                primary: {
                    DEFAULT: '#4f46e5',    // Indigo-600
                    hover: '#6366f1'       // Indigo-500
                },
                secondary: {
                    DEFAULT: '#3f37c9',    // Deeper indigo
                    hover: '#4338ca'       // Indigo-700
                },
                accent: {
                    DEFAULT: '#4895ef',    // Sky-500
                    hover: '#3b82f6'       // Blue-500
                },
                // Dark mode colors (standard gray palette)
                gray: {
                    900: '#0f172a',        // Dark primary
                    800: '#1e293b',        // Dark secondary
                    700: '#334155',        // Dark tertiary
                }
            }
        },
    },
    plugins: [],
};
