module.exports = {
    plugins: [
        require('postcss-import'),
        require('postcss-extend-rule'),
        require('tailwindcss/nesting'),
        require('tailwindcss'),
        require('autoprefixer')
    ]
}
