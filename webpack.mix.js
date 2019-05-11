const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Added webpackConfig settings
mix.webpackConfig({
  module: {
    rules: [
      { // JavaScript Prettier Setting
        test: /\.js$/,
        loader: 'prettier-loader',
        options: { // Prettier Options https://prettier.io/docs/en/options.html
          singleQuote: true,
          semi: false
        }
      },
      { // Sass Prettier Setting
        test: /\.scss$/,
        loader: 'prettier-loader',
        options: {
          parser: "postcss"
        }
      },
    ]
  }
})

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')