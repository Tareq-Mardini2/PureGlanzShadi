import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/DashboardStyle.css',
                'resources/css/Login.css',
                'resources/js/app.js',
                'resources/js/AdminDashboard.js',
                'resources/js/script.js',
            ],
            refresh: true,
        }),
    ],
});
