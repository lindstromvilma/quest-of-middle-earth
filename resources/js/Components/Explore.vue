<script setup>
import { usePage } from '@inertiajs/vue3'
import { ref, shallowRef, computed } from 'vue'
import Shire from './StoryPages/Shire.vue'
import RoadToBree from './StoryPages/RoadToBree.vue'
import Bree from './StoryPages/Bree.vue'
import RoadToRivendell from './StoryPages/RoadToRivendell.vue'
import Rivendell from './StoryPages/Rivendell.vue'
import RoadToLothlorien from './StoryPages/RoadToLothlorien.vue'

const { props } = usePage()

const user = ref(props.auth.user)
const travelLog = ref(props.travelLog)
const traveledDistance = ref(user.value.traveled_distance || '')
const currentMilestone = ref(props.currentMilestone || null)
const currentPage = ref(1)

const pages = shallowRef([
	Shire,
	RoadToBree,
	Bree,
	RoadToRivendell,
	Rivendell,
	RoadToLothlorien,
])

const flipDirection = ref('next')

const nextPage = () => {
	if (currentPage.value < pages.value.length) {
		flipDirection.value = 'next'
		currentPage.value += 1
	}
}

const prevPage = () => {
	if (currentPage.value > 1) {
		flipDirection.value = 'prev'
		currentPage.value -= 1
	}
}

const canGoNext = computed(() => currentPage.value < pages.value.length)
const canGoPrev = computed(() => currentPage.value > 1)

const handleNextPage = () => {
	if (canGoNext.value) {
		nextPage()
	}
}

const handlePrevPage = () => {
	if (canGoPrev.value) {
		prevPage()
	}
}
</script>

<template>
  <div class="relative md:mx-auto w-full h-screen bg-white md:shadow-lg overflow-hidden">
    <div
      :class="['absolute top-0 left-0 h-full w-[10%] z-50', canGoPrev ? 'cursor-pointer hover:turn-page-left' : '']"
      @click="handlePrevPage"
    ></div>
    <div class="absolute top-0 left-[10%] h-fullw-[80%] z-50"></div>
    <div
      :class="['absolute top-0 left-[90%] h-full w-[10%] z-50', canGoNext ? 'cursor-pointer hover:turn-page-right' : '']"
      @click="handleNextPage"
    ></div>

    <transition :name="flipDirection === 'next' ? 'flip-right' : 'flip-left'">
      <component
        :is="pages[currentPage - 1]"
        :key="currentPage"
        class="w-full h-full"
      />
    </transition>
  </div>
</template>