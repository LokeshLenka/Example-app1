import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        manifest: "manifest.json",
        rollupOptions: {
            output: {
                manualChunks: undefined
            }
        }
    },
    server: {
        hmr: {
            host: 'localhost'
        }
    },
     base: '/build/',
});
