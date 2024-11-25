<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template #footer>
  <div class="bg-rivendell-blue text-center sm:px-6 sm:py-8 md:px-8 md:py-12">
    <p class="font-almendra font-normal text-lg tracking-normal text-lothlorien-gold mb-6">
      “Faithless is he that says farewell when the road darkens.”
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-4 mb-4">
      <Link
        :href="route('about')"
        class="text-xs text-lothlorien-gold underline-animation"
      >
        About Journey
      </Link>
      <Link
        :href="route('privacy')"
        class="text-xs text-lothlorien-gold underline-animation"
      >
        Privacy Policy
      </Link>
      <Link
        :href="route('accessibility')"
        class="text-xs text-lothlorien-gold underline-animation"
      >
        Accessibility
      </Link>
    </div>
    <p class="font-light text-xs text-lothlorien-gold">
      &copy; 2024 Quest of Middle-earth. All rights reserved.
    </p>
  </div>
</template>
