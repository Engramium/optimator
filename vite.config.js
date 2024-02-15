import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    port: parseInt(process.env.VITE_PORT) || 4000,
  },
  plugins: [vue()],
  build: {
    rollupOptions: {
      // minify: 'terser',
      // terserOptions: {
      //   compress: {
      //     keep_fnames: ['__'],
      //   },
      // },
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name][extname]`
      }
    }
  }
})