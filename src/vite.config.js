import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/welcome.css',
                'resources/css/style_signin.css',
                'resources/css/style_rules.css',
                'resources/css/style_news_index.css',
                'resources/css/style_news_show.css',
            ],
            refresh: true,
        }),
    ],
});
