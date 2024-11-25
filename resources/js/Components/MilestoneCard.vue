<script setup>
const props = defineProps({
	title: String,
	content: String,
	image: {
		type: String,
		default: '',
	},
	backgroundColor: {
		type: String,
		default: 'bg-white',
	},
	textColor: {
		type: String,
		default: 'text-black',
	},
})
</script>

<template>
  <div :class="[backgroundColor, textColor, 'rounded shadow-md overflow-hidden']">
    <img
      v-if="image"
      :src="image"
      alt="Card image"
      class="w-full h-52 object-cover"
    >
    <div class="px-6 py-4">
      <h3 class="text-lg font-semibold mb-1">
        {{ title }}
      </h3>
      <p class="text-base leading-relaxed">
        {{ content }}
      </p>
    </div>
  </div>
</template>
