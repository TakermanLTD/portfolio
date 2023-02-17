<script setup lang="ts">
import AppHeader from "./components/AppHeader.vue";
import Footer from "./components/Footer.vue";
</script>

<template>
  <AppHeader></AppHeader>
  <main id="main">
    <RouterView />
  </main>
  <Footer></Footer>
</template>