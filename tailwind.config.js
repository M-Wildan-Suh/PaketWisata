import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
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
            // colors: {
            //     'byolink-1' : '#3b82f6',
            //     'byolink-2' : '#fac534',
            //     'byolink-3' : '#1e40af',
                colors: {
    'byolink-1': '#6BAA75',
    'byolink-2': '#F4D19B', 
    'byolink-3': '#87B9E0',

            }
        },
    },

    plugins: [forms],
};
