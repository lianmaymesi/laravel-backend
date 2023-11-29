import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/vendor/laravel-backend/laravel-backend.hot', // Most important lines
            buildDirectory: 'vendor/laravel-backend',
            input: [
                'resources/dist/css/app.css',
                'resources/dist/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
