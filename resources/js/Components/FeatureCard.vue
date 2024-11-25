<script setup>
const props = defineProps({
	title: String,
	description: String,
	icon: String,
	section: String
})
</script>

<template>
  <div
    class="bg-white rounded shadow-md py-6 px-8 flex flex-col items-center text-center cursor-default w-full md:w-1/3 transform transition-transform duration-300 ease-in-out hover:scale-105 subpixel-antialiased"
  >
    <img
      :src="icon"
      alt="Feature icon"
      class="w-16 h-16 mb-4 object-cover"
    />
    <h3 class="text-lg font-semibold mb-2">
      {{ title }}
    </h3>
    <p class="text-base">
      {{ description }}
    </p>
  </div>
</template>
