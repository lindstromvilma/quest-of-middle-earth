<script setup>
const props = defineProps({
	achievement: {
		type: Object,
		required: true
	}
})

const date = new Date()
const src = props.achievement?.icon ? `stickers/${props.achievement.icon}` : ''

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
  <div
    v-if="achievement"
    class="fixed bottom-4 right-4 border rounded shadow-md bg-gray-50 max-w-80 fade-in-out"
  >
    <div class="flex flex-col">
      <div class="flex items-center gap-2 p-4">
        <img
          :src="src"
          alt="Achievement Icon"
          class="w-10 h-10"
        />
        <div>
          <h3 class="text-sm font-semibold">
            {{ achievement?.name }}
          </h3>
          <p class="text-xs text-gray-500 leading-tight">
            {{ achievement?.short_description }}
          </p>
        </div>
      </div>
      <div class="bg-gondor-light text-gray-500 px-4 py-1">
        <p class="text-xs">
          Unlocked {{ formatDate(date) }}
        </p>
      </div>
    </div>
  </div>
</template>
