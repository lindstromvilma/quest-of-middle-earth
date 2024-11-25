<script setup>
defineProps({
	value: {
		type: String,
	},
	required: {
		type: Boolean,
		default: false,
	},
});
</script>

<template>
  <label class="block text-xs font-semibold mb-0.5">
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </label>
</template>
