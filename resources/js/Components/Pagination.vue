<script setup>
import { computed } from 'vue'

const props = defineProps({
	totalEntries: {
		type: Number,
		required: true,
	},
	perPage: {
		type: Number,
		required: true,
	},
	modelValue: {
		type: Number,
		required: true,
	}
})

const emit = defineEmits(['update:modelValue'])

const totalPages = computed(() => {
	return Math.ceil(props.totalEntries / props.perPage)
})

const prevPage = () => {
	if (props.modelValue > 1) {
		emit('update:modelValue', props.modelValue - 1)
	}
}

const nextPage = () => {
	if (props.modelValue < totalPages.value) {
		emit('update:modelValue', props.modelValue + 1)
	}
}

const goToPage = (page) => {
	emit('update:modelValue', page)
}
</script>

<template>
  <ol class="flex justify-center gap-1 text-xs font-medium">
    <li>
      <button
        :disabled="props.modelValue <= 1"
        class="inline-flex size-8 items-center justify-center rounded border border-gray-100 text-moria-gray"
        @click="prevPage"
      >
        <span class="sr-only">Prev Page</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="size-3"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
    </li>

    <li
      v-for="page in totalPages"
      :key="page"
    >
      <button
        :class="[
          'block size-8 rounded border text-center leading-8',
          props.modelValue === page ? 'bg-gondor-light text-moria-gray' : 'border-gray-100 text-moria-gray'
        ]"
        @click="goToPage(page)"
      >
        {{ page }}
      </button>
    </li>

    <li>
      <button
        :disabled="props.modelValue >= totalPages"
        class="inline-flex size-8 items-center justify-center rounded border border-gray-100 text-moria-gray"
        @click="nextPage"
      >
        <span class="sr-only">Next Page</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="size-3"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
    </li>
  </ol>
</template>
