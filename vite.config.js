import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    build: {
        rollupOptions: {
          external: ['reverb-js'],  // Add reverb-js as external if Vite can't resolve it
        },
      },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    define: {
      'process.env': {}, // Optional: Ensures compatibility with older code
  },
});
