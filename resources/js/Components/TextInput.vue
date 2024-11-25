<script setup>
import { onMounted, ref } from 'vue'

const model = defineModel({
	type: [ String, Number ],
	default: '',
});

const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute('autofocus')) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <input
    ref="input"
    v-model="model"
    class="border-gray-300 text-xs font-medium w-full px-3 py-2.5 border focus:border-moria-gray focus:ring-0 focus:ring-moria-gray rounded"
  />
</template>
