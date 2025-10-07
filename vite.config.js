import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwind from '@tailwindcss/vite'
import fg from 'fast-glob'

const pageEntries = fg.sync([
    'resources/css/**/*.css',
    'resources/scss/pages/*.scss',
    'resources/js/**/*.js',
    'resources/ts/**/*.ts',
    'resources/scss/components/footer.scss',
    'resources/scss/components/header.scss',
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
