/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            fontWeight: {
                semibold: '600',
            },
            fontFamily: {
                mulish: ['Mulish', 'sans-serif'], 
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
