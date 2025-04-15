<<<<<<< HEAD
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
=======
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js'],
=======
            input: ["resources/css/app.css", "resources/js/app.js"],
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
            refresh: true,
        }),
        tailwindcss(),
    ],
});
