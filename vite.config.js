import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/style.css',
                'recources/js/main.js',
                'recources/css/skill.css',
                'recources/js/skill.js',
                'recources/css/contact.css',
                'recources/css/blog-home.css',
                'resources/css/admin/sb-admin-22.css',
                'resources/css/admin/sb-admin-23.css',
                'resources/css/admin/sb-admin-2.css',
                'resources/css/admin/sb-admin-2.min.css',
                'resources/js/admin/sb-admin-2.min.js',
                'resources/js/admin/sb-admin-2.js',



            ],
            refresh: true,
        }),
    ],
});
