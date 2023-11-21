/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.ts",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'coursera-blue': '#0056D2'
            }
        },
    },
    plugins: [],
}
