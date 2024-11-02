import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // 'resources/css/pico-main/css/pico.sand.css',
                'resources/js/toggle.js',
            ],
            refresh: true,
        }),
    ],
});
