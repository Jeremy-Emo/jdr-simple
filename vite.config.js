import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";
import vue from "@vitejs/plugin-vue"

export default defineConfig({
    plugins: [
        vue(),
        symfonyPlugin(),
    ],
    build: {
        rollupOptions: {
            input: {
                app: "./assets/app.ts",
                home: "./assets/home.ts",
                adminDashboard: "./assets/admin/dashboard.ts"
            },
        }
    },
});
