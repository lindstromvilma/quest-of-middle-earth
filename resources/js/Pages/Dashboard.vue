<script setup>
import { router, usePage } from '@inertiajs/vue3'
import { ref, watch, onMounted } from 'vue'
import BaseLayout from '@/Layouts/BaseLayout.vue'
import DashboardNav from '@/Components/DashboardNav.vue'
import HowToUse from '@/Components/HowToUse.vue'
import JourneyStats from '@/Components/JourneyStats.vue'
import TravelLogForm from '@/Components/TravelLogForm.vue'
import TravelLogTable from '@/Components/TravelLogTable.vue'
import Achievements from '@/Components/Achievements.vue'
import AchievementBanner from '@/Components/AchievementBanner.vue'
import Explore from '@/Components/Explore.vue'

const { props } = usePage()

const user = ref(props.auth.user)
const traveledDistance = ref(user.value.traveled_distance || '')
const currentMilestone = ref(props.currentMilestone || null)
const nextMilestone = ref(props.nextMilestone || null)
const remainingDistanceToNextMilestone = ref(props.remainingDistanceToNextMilestone || 0)
const remainingDistanceToGoal = ref(props.remainingDistanceToGoal || 0)
const terrains = ref(props.terrains || [])
const newAchievements = ref(props.newAchievements || [])

// toggle state for how to use section
const showHowToUse = ref(false)
const toggleHowToUse = () => {
	showHowToUse.value = !showHowToUse.value
}

// set selected section to journey stats by default
const selectedSection = ref('journey-stats')

// update local storage whenever the selected section changes
const handleSectionSelect = (section) => {
	selectedSection.value = section
	localStorage.setItem('selectedSection', section)
}

// track index of currently displayed achievement
const currentAchievementIndex = ref(0)
const showBanner = ref(false)

// wtch for new achievements and show one at a time
watch(newAchievements, (newVal) => {
	if (newVal.length) {
		currentAchievementIndex.value = 0
		showBanner.value = true
		setTimeout(() => {
			showBanner.value = false
		}, 5000)
	}
}, { immediate: true })

onMounted(() => {
	const savedSection = localStorage.getItem('selectedSection')
	if (savedSection) {
		selectedSection.value = savedSection
	}
})

// reload achievements to update new achievements
router.reload(route('dashboard'), {
	only: ['achievements'],
})
</script>

<template>
  <BaseLayout>
    <div class="flex bg-white rounded shadow-md mx-6 my-6 w-full max-w-screen-2xl min-h-screen">
      <DashboardNav @select-section="handleSectionSelect" />
      <div class="flex flex-col gap-10 sm:px-6 sm:py-8 md:px-12 md:py-8 w-full">
        <div
          v-if="selectedSection !== 'explore'"
          class="flex items-center justify-between"
        >
          <h1 class="font-almendra text-3xl md:text-4xl font-bold">
            Ring bearer's Dashboard
          </h1>
          <img
            src="/stickers/help.png"
            alt="info"
            class="w-9 h-9 md:w-10 md:h-10 object-cover cursor-pointer transform transition-transform duration-300 ease-in-out hover:scale-125"
            @click="toggleHowToUse"
          />
        </div>
        <HowToUse v-if="showHowToUse" />

        <JourneyStats
          v-if="selectedSection === 'journey-stats'"
          :traveled-distance="traveledDistance"
          :next-milestone="nextMilestone"
          :current-milestone="currentMilestone"
          :remaining-distance-to-next-milestone="remainingDistanceToNextMilestone"
          :remaining-distance-to-goal="remainingDistanceToGoal"
        />

        <TravelLogForm
          v-if="selectedSection === 'travel-log'"
          :terrains="terrains"
        />

        <TravelLogTable v-if="selectedSection === 'travel-log'" />

        <Achievements v-if="selectedSection === 'achievements'" />

        <Explore v-if="selectedSection === 'explore'" />
      </div>
    </div>
    <AchievementBanner
      v-show="showBanner"
      :achievement="newAchievements[currentAchievementIndex] ?? {}"
      class="fade-in-out"
    />
  </BaseLayout>
</template>
