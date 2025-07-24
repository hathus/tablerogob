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
            colors: {
                rojoins: '#e52e2e',
                doradoins: '#D0B787',
                naranjains: '#f08018',
                azulins: '#00b4ce',
                moradoins: '#572772',
                rosains: '#A11A5C',
                verdeins: '#77B82a',
                contrast: '222222',
                contrast2: '575760',
                contrast3: 'b2b2be',
                base: 'f0f0f0',
                base2: 'f7f8f9',
                base3: 'ffffff',
                accent: '791fbf',
            },
            fontFamily: {
                sans: ['Sofia Pro', ...defaultTheme.fontFamily.sans],
                intro: ['intro', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
