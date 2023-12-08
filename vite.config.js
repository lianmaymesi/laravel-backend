import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/vendor/laravel-backend/laravel-backend.hot', // Most important lines
            buildDirectory: 'vendor/laravel-backend',
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/choices.css',
                'resources/css/toastui.css'
            ],
            refresh: true,
        }),
    ],
});
