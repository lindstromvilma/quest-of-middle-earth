<script setup>
defineProps({
	type: {
		type: String,
		default: 'submit',
	},
	active: {
		type: Boolean,
		default: false,
	},
})
</script>

<template>
  <button
    :type="type"
    class="text-xs font-medium text-white text-center px-6 py-2.5 rounded bg-bree-brown hover:bg-gondor-beige hover:text-moria-gray transition ease-in-out duration-150"
    :class="[{ 'bg-gondor-beige !text-moria-gray': active }]"
  >
    <slot />
  </button>
</template>
