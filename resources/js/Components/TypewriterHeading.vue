<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
	text: String,
	typingSpeed: {
		type: Number,
		default: 100,
	},
});

const emit = defineEmits(['complete']);

const displayText = ref('');
let index = 0;

const type = () => {
	if (index < props.text.length) {
		displayText.value += props.text[index];
		index++;
		setTimeout(type, props.typingSpeed);
	} else {
		emit('complete');
	}
};

onMounted(() => {
	type();
});
</script>

<template>
  <h1>
    {{ displayText }}
  </h1>
</template>