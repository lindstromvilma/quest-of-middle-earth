<script setup>
import { ref, computed } from 'vue'

const links = [
	{
		name: 'journey-stats',
		icon: 'stickers/milestone.png',
		label: 'Journey stats',
	},
	{
		name: 'travel-log',
		icon: 'stickers/journal.png',
		label: 'Travel Log',
	},
	{
		name: 'achievements',
		icon: 'stickers/star.png',
		label: 'Achievements',
	},
	{
		name: 'explore',
		icon: 'stickers/map.png',
		label: 'Explore',
	},
]

const hover = ref(false)

const textVisible = computed(() => {
	return hover.value
})

const handleMouseEvent = () => {
	hover.value = !hover.value
}

// emit the section selection
const emit = defineEmits(['selectSection'])
const selectSection = (section) => emit('selectSection', section)
</script>

<template>
  <!-- sidebar for medium screens and up -->
  <nav
    :class="[
      'hidden md:flex flex-col bg-gondor-light min-h-max rounded-l gap-6 py-8 px-5 transition-all ease-in-out duration-300',
      hover ? 'w-64' : 'w-20'
    ]"
    @mouseenter="handleMouseEvent"
    @mouseleave="handleMouseEvent"
  >
    <button
      v-for="link in links"
      :key="link.name"
      class="flex items-center gap-4 w-max"
      @click="selectSection(link.name)"
    >
      <img
        :src="link.icon"
        :alt="link.label"
        class="md:w-10 md:h-10"
      />
      <span
        v-if="textVisible"
        class="fade-in underline-animation"
        :class="{ 'opacity-0': !hover }"
      >
        {{ link.label }}
      </span>
    </button>
  </nav>

  <!-- bottom nav bar for mobile -->
  <nav
    class="flex md:hidden fixed z-20 bottom-0 left-0 right-0 bg-gondor-light py-3 px-4 justify-evenly transition-all ease-in-out duration-300"
  >
    <button
      v-for="link in links"
      :key="link.name"
      class="flex flex-col items-center gap-1"
      @click="selectSection(link.name)"
    >
      <img
        :src="link.icon"
        :alt="link.label"
        class="w-8 h-8"
      />
      <span
        class="text-xs"
      >
        {{ link.label }}
      </span>
    </button>
  </nav>
</template>

