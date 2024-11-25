<script setup>
const props = defineProps({
	achievement: {
		type: Object,
		required: true
	},
	unlockedDate: {
		type: String,
		default: null
	}
})

// Format date function
const formatDate = (date) => {
	return new Date(date).toLocaleDateString('en-US', {
		year: 'numeric',
		month: 'short',
		day: 'numeric',
		hour: '2-digit',
		minute: '2-digit',
	})
}
</script>

<template>
  <div class="p-4 border rounded shadow-sm bg-white">
    <div class="flex items-center gap-4">
      <img
        :src="`stickers/${achievement.icon}`"
        alt="Achievement Icon"
        class="w-10 h-10"
      />
      <div>
        <h3 class="text-sm font-semibold">
          {{ achievement.name }}
        </h3>
        <p class="text-xs text-gray-500 leading-tight">
          {{ achievement.description }}
        </p>
      </div>
      <div class="text-right">
        <p
          v-if="unlockedDate"
          class="text-xs text-gray-500"
        >
          Unlocked on {{ formatDate(unlockedDate) }}
        </p>
      </div>
    </div>
  </div>
</template>
