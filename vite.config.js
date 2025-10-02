import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwind from '@tailwindcss/vite'
import fg from 'fast-glob'

const pageEntries = fg.sync([
    'resources/css/**/*.css',
    'resources/scss/**/*.scss',
    'resources/js/**/*.js',
    'resources/ts/**/*.ts',
])
export default defineConfig({
    plugins: [
        tailwind(),
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/scss/app.scss',
                'resources/js/app.js',
                ...pageEntries,
            ],
            refresh: true,
        }),
    ],
});
