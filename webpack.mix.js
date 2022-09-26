const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
const options = {
    postCss: [
        require('postcss-discard-comments')({
            removeAll: true
        })
    ],
    uglify: {
        uglifyOptions: {
            comments: false
        },
    }
};
mix.options(options)
    .js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .copy("resources/fonts", "public/fonts")
    .sourceMaps()
    .version();
