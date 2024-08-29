const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    baseUrl: 'https://localhost:7047',
    setupNodeEvents(on, config) {
    }
  },
  component: {
    devServer: {
      framework: 'vue',
      bundler: 'vite',
    },
  }
});
