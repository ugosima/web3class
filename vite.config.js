import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/waitlist.js',
                'resources/js/toggledark.js',

            ],
            refresh: true,
        }),
        tailwindcss(),
    ],


    //  server: {
    //     host: true,
    //     port: 5173,
    //     strictPort: true,
    //     hmr: {
    //         host: '10.150.169.1' // <-- replace with YOUR laptop IP
    //     }
    // }
   
})
