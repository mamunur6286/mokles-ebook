import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue2';
import path from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        watch: {
            usePolling: true,
            interval: 1000, // Adjust this value if needed
          },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '@containers': path.resolve(__dirname, 'resources/js/containers'),
            '@views': path.resolve(__dirname, 'resources/js/views'),
            vue: 'vue/dist/vue.esm.js',
        }
    }
});