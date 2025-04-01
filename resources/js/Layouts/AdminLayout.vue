<script setup>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
</script>

<template>
  <div>
    <Navbar />
    <main class="min-h-[100vh]">
      <slot />
    </main>
    <Footer />
  </div>
</template>

<style>
/* Add your styles here */
</style>
