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
        // Add manifest for production
        manifest: true,
        rollupOptions: {
            // Ensure proper handling of dynamic imports
            output: {
                manualChunks: undefined,
            },
        },
    },
    // Add base URL configuration
    base: '/build/',
});
