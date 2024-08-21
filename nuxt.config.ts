// https://nuxt.com/docs/api/configuration/nuxt-config
import {resolve} from "path";


export default defineNuxtConfig({
    devtools: {enabled: false},
    css: [
        '~/assets/style/main.scss',
    ],
    resolve: {
        alias: {
            "@": resolve(".")
        }
    },
    server: {
        port: 3000,
        host: '0.0.0.0',
    },
})