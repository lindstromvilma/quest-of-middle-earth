<script setup>
import { usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import AchievementsCard from '@/Components/AchievementCard.vue'

const { props } = usePage()

const user = ref(props.auth.user)
const achievements = ref(props.achievements || [])

const unlockedAchievements = computed(() =>
	achievements.value.filter(achievement =>
		user.value.achievements.some(userAchievement => userAchievement.id === achievement.id)
	)
)

const lockedAchievements = computed(() =>
	achievements.value.filter(achievement =>
		!user.value.achievements.some(userAchievement => userAchievement.id === achievement.id)
	)
)

const totalAchievements = computed(() => achievements.value.length)
const unlockedCount = computed(() => unlockedAchievements.value.length)

const progressPercentage = computed(() => {
	return Math.round((unlockedCount.value / totalAchievements.value) * 100)
})

const getUnlockedDate = (achievementId) => {
	const userAchievement = user.value.achievements.find(userAchievement => userAchievement.id === achievementId)
	return userAchievement ? userAchievement.created_at : null
}
</script>

<template>
  <div>
    <!-- Progress Text -->
    <div class="text-xs text-left font-semibold tracking-wide uppercase flex justify-between">
      <p>
        {{ unlockedCount }} of {{ totalAchievements }} achievements earned
      </p>
      <p>({{ progressPercentage }}%)</p>
    </div>

    <!-- Progress Bar with Percentage -->
    <div class="relative w-full bg-gray-200 rounded-full h-4 mb-6">
      <div
        class="bg-shire-green h-full rounded-full"
        :style="{ width: progressPercentage + '%' }"
      ></div>
    </div>
  </div>

  <div>
    <!-- Unlocked Achievements -->
    <div
      v-if="unlockedAchievements.length"
      class="mb-6"
    >
      <h3 class="text-sm font-semibold text-gray-400 uppercase mb-1">
        Unlocked Achievements
      </h3>
      <div class="grid grid-cols-1 gap-2">
        <AchievementsCard
          v-for="achievement in unlockedAchievements"
          :key="achievement.id"
          :achievement="achievement"
          :unlocked-date="getUnlockedDate(achievement.id)"
        />
      </div>
    </div>

    <!-- Locked Achievements -->
    <div>
      <h3 class="text-sm font-semibold text-gray-400 uppercase mb-1">
        Locked Achievements
      </h3>
      <div class="grid grid-cols-1 gap-2">
        <AchievementsCard
          v-for="achievement in lockedAchievements"
          :key="achievement.id"
          :achievement="achievement"
          :unlocked-date="null"
        />
      </div>
    </div>
  </div>
</template>
