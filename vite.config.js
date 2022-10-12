import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import { transform } from 'lodash';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/welcome.js',
                'resources/js/pages/index.js',

            ],
            refresh: true,
        }),
        vue({
            template :{
                transformAssetUrls: {
                    base : null,
                    includeAbsolute : false,

                }
            }
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js'
        },
    },
});
