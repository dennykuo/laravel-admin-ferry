import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
// import { folderInput } from 'rollup-plugin-folder-input' // 讓 buil.rollupOptions.input 可以接受 dir
// import path from 'path'

export default defineConfig({
  server: {
    port: 5180
  },
  plugins: [
    vue()
  ],
  publicDir: true,
  css: {
    devSourcemap: true // dev 狀態下，不使用 sourcemap，因找不到檔案
  },
  build: {
    rollupOptions: {
      input: ['/resources/css/app.css', '/resources/js/app.js']
    },
    manifest: true,
    outDir: './assets', // vite 輸出路徑，相對於 root
    assetsDir: '', // vite 輸出資料夾，相對於 outDir，專案省略讓 static 資料夾不會被清空及覆蓋
    emptyOutDir: true,
    sourcemap: true,
    assetsInlineLimit: 999999 // 多少容量的資源編碼為 base64
  }
})
