<script setup>
import { ref, watch } from 'vue'
import VueTailwindDatepicker from 'vue-tailwind-datepicker'

const props = defineProps({
	modelValue: {
		type: [String, Array],
		default: ''
	},
	range: {
		type: Boolean,
		default: false
	},
	placeholder: {
		type: String,
		default: 'Select a date'
	},
})

const emit = defineEmits(['update:modelValue'])

const selectedDate = ref(props.modelValue)

watch(() => props.modelValue, (newValue) => {
	selectedDate.value = newValue
})

watch(selectedDate, (newValue) => {
	emit('update:modelValue', newValue)
})

const formatter = {
	date: 'DD-MM-YYYY',
	month: 'MMM'
}
</script>

<template>
  <vue-tailwind-datepicker
    v-model="selectedDate"
    :formatter="formatter"
    :as-single="!range"
    :as-range="range"
    weekdays-size="min"
    :placeholder="placeholder"
    input-classes="border-gray-300 text-xs font-medium w-full px-3 py-2.5 border focus:border-moria-gray focus:ring-0 focus:ring-moria-gray rounded"
  />
</template>
