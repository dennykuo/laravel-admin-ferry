import postcssImport from 'postcss-import';
import postcssExtendRule from 'postcss-extend-rule';
import tailwindcssNesting from 'tailwindcss/nesting/index.js';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';

export default {
    plugins: [
        postcssImport,
        postcssExtendRule,
        tailwindcssNesting,
        tailwindcss,
        autoprefixer
    ]
}
