import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
     darkMode: 'media', 
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            listStyleType:
            {
              dash:'"-"',
            },
            colors: {
                tw: {
                bg: '#0b1531',
                card: '#111b3a',
                accent: '#2b6ef6',
                text: '#e5edff',
                sub: '#9bb1ff'
                }},
            borderRadius: { app: '24px' },
            boxShadow: { soft: '0 8px 30px rgba(0,0,0,0.25)' }
                        },
                    },

    plugins: [forms],
};
