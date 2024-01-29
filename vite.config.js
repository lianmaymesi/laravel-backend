import { defineConfig, splitVendorChunkPlugin } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/vendor/laravel-backend/laravel-backend.hot', // Most important lines
            buildDirectory: 'vendor/laravel-backend',
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/daterange.css',
                'resources/css/choices.css',
                'resources/css/toastui.css'
            ],
            refresh: true,
        }),
        splitVendorChunkPlugin(),
    ],
    build: {
        rollupOptions: {
            output:{
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                }
            }
        }
    }
});
