<script setup>
const props = defineProps({
	modelValue: [String],
	options: {
		type: Array,
		default: () => []
	},
	defaultValue: {
		type: String,
		default: 'Select an option'
	}
});

const emit = defineEmits(['update:modelValue'])
function updateValue(value) {
	emit('update:modelValue', value)
}
</script>

<template>
  <select
    :value="modelValue"
    class="border-gray-300 text-xs text-gray-400 font-medium w-full px-3 select-padding border focus:border-moria-gray focus:ring-0 focus:ring-moria-gray rounded"
    @change="updateValue($event.target.value)"
  >
    <option
      value=""
    >
      {{ defaultValue }}
    </option>
    <option
      v-for="option in options"
      :key="option.id"
      :value="option.id || option.value"
    >
      {{ option.name || option }}
    </option>
  </select>
</template>