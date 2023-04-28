const mix = require('laravel-mix');
const path = require('path');

mix.js([
    'resources/js/app.js',
    'resources/js/demo-theme.min.js',
    'resources/js/demo.min.js',
    'resources/js/tabler.esm.min.js',
    'resources/js/tabler.min.js',
], 'public/js')
    .vue()
    .webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json'],
            alias: {
                '@': path.resolve('resources/js'),
            },
        },
    });


