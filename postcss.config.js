import postcssImport from 'postcss-import';
import postcssExtendRule from 'postcss-extend-rule';
import tailwindcss from '@tailwindcss/postcss';

export default {
    plugins: [
        postcssImport,
        postcssExtendRule,
        tailwindcss
    ]
}
