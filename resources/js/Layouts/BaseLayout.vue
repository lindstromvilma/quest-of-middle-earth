<script setup>
import HeaderLayout from '@/Layouts/HeaderLayout.vue'
import FooterLayout from '@/Layouts/FooterLayout.vue'
</script>

<template>
  <div class="flex flex-col min-h-screen">
    <!-- Page Header -->
    <header-layout>
      <slot name="header" />
    </header-layout>

    <!-- Page Content -->
    <main class="flex grow items-center justify-center self-center bg-gray-50 w-full">
      <slot />
    </main>

    <!-- Page Footer -->
    <footer-layout class="text-white text-sm tracking-wide">
      <slot name="footer" />
    </footer-layout>
  </div>
</template>
