<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
	href: {
		type: String,
		required: true,
	},
	active: {
		type: Boolean,
		default: false,
	},
});

const classes = computed(() =>
	props.active
		? 'inline-flex items-center text-lothlorien-gold font-semibold text-sm focus:outline-none underline-animation link-active link-exact-active'
		: 'inline-flex items-center text-lothlorien-gold font-semibold text-sm focus:outline-none underline-animation'
);
</script>

<template>
  <Link
    :href="href"
    :class="classes"
  >
    <slot />
  </Link>
</template>
