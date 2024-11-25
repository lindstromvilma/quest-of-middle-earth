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
    class="text-xs font-medium text-white text-center px-6 py-2.5 rounded bg-rivendell-blue hover:bg-rivendell-blue-light hover:text-white transition ease-in-out duration-150"
    :class="[{ 'bg-rivendell-blue-light !text-white': active }]"
  >
    <slot />
  </button>
</template>
