<script setup lang="ts">
import AppHeader from "./components/AppHeader.vue";
import Footer from "./components/Footer.vue";
import Preloader from "./components/Preloader.vue";
</script>

<template>
  <AppHeader></AppHeader>
  <main id="main">
    <RouterView />
  </main>
  <Footer></Footer>
  <Preloader></Preloader>
</template>