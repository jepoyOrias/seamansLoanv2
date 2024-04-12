import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors');
/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        'node_modules/preline/dist/*.js',
        "./node_modules/vue-tailwind-datepicker/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                "vtd-primary": colors.sky,
                "vtd-secondary": colors.gray,
                'blue':  {
                    '50': '#f1f5ff',
                    '100': '#e5e9ff',
                    '200': '#ced7ff',
                    '300': '#a7b5ff',
                    '400': '#7685ff',
                    '500': '#3f4aff',
                    '600': '#1818ff',
                    '700': '#0708fa',
                    '800': '#0506d2',
                    '900': '#000577',
                    '950': '#0607ac',
                },
                'yellow': {
                    '50': '#fbffe7',
                    '100': '#f4ffc1',
                    '200': '#efff86',
                    '300': '#edff41',
                    '400': '#f4ff0d',
                    '500': '#ebe900',
                    '600': '#d1bd00',
                    '700': '#a68a02',
                    '800': '#896b0a',
                    '900': '#74570f',
                    '950': '#442f04',
                },
                
                
            },
        },
        
    },
    plugins: [forms, require('preline/plugin')],
};
