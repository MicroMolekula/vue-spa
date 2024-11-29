import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import babel from 'vite-plugin-babel';

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueDevTools(),
    babel({
      babelConfig: {
        presets: [
          [
            '@babel/preset-env',
            {
              targets: '> 0.25%, not dead', // Настройка поддержки браузеров
              modules: false
            },
          ],
        ]
      },
    }),
  ],
  build: {
    minify: 'terser', // Минификация с помощью Terser
    terserOptions: {
      format: {
        comments: false, // Удалить комментарии
      },
    },
  },
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  server: {
    proxy: {
      '/api': {
        target: 'https://api.vk.com',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, '')
      }
    }
  }
})
