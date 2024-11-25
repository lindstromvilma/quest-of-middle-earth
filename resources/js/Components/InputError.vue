<script setup>
defineProps({
	message: {
		type: String,
	},
});
</script>

<template>
  <div v-if="message">
    <p class="font-medium text-xs text-mordor-red">
      {{ message }}
    </p>
  </div>
</template>
