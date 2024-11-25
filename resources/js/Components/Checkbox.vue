<script setup>
import { computed } from 'vue'

const emit = defineEmits(['update:checked'])

const props = defineProps({
	checked: {
		type: Boolean,
		default: false,
	},
	value: {
		type: [String, Number, Boolean],
		default: null,
	},
})

// manage checkbox state
const proxyChecked = computed({
	get() {
		return props.checked;
	},
	set(val) {
		emit('update:checked', val)
	},
})
</script>

<template>
  <input
    v-model="proxyChecked"
    type="checkbox"
    :value="value"
    class="text-xs text-shire-green h-4 w-4 border border-gray-300 focus:border-moria-gray focus:ring-0 focus:ring-moria-gray rounded"
  />
</template>
