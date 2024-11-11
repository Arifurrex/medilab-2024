import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/style.css',
                'resources/css/bootstrap.min.css',
                'resources/css/font-awesome.min.css',
                'resources/css/elegant-icons.css',
                'resources/css/nice-select.css',
                'resources/css/jquery-ui.min.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/slicknav.min.css',
                'resources/css/style.css',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
