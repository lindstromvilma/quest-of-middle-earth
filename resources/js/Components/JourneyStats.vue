<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
	traveledDistance: [Number, String],
	currentMilestone: Object,
	nextMilestone: Object,
	remainingDistanceToNextMilestone: Number,
	remainingDistanceToGoal: Number,
})

const traveledDistance = ref(props.traveledDistance)
const currentMilestone = ref(props.currentMilestone)
const nextMilestone = ref(props.nextMilestone)
const remainingDistanceToNextMilestone = ref(props.remainingDistanceToNextMilestone)
const remainingDistanceToGoal = ref(props.remainingDistanceToGoal)
</script>

<template>
  <section class="space-y-10">
    <div class="flex flex-col gap-2">
      <h2 class="text-lg font-semibold">
        Journey status
      </h2>
      <p
        v-if="currentMilestone"
        class="text-sm"
      >
        {{ currentMilestone?.name }}: {{ currentMilestone?.description }}
      </p>
      <div
        v-else
        class="text-sm"
      >
        <p>
          You have not started your journey yet. <br />
          Track your first distance and update Travel log to start your journey!
        </p>
      </div>
    </div>

    <div class="flex flex-col gap-2">
      <h2 class="text-lg font-semibold">
        Next milestone
      </h2>
      <p
        v-if="nextMilestone"
        class="text-sm"
      >
        {{ nextMilestone?.name }}: {{ nextMilestone?.description }}
      </p>
      <p v-else>
        You have reached the end of your journey
      </p>
    </div>

    <div class="text-center grid grid-flow-row md:grid-flow-col gap-2 w-full">
      <div class="flex-1 flex flex-col justify-center items-center w-full bg-rivendell-blue rounded py-6 px-12">
        <p class="text-sm leading-6 text-lothlorien-gold">
          You have traveled
        </p>
        <h2 class="sm:text-3xl md:text-4xl font-semibold tracking-tight text-lothlorien-gold">
          {{ traveledDistance }} km
        </h2>
      </div>
      <div class="flex-1 flex flex-col justify-center items-center w-full bg-rivendell-blue rounded py-6 px-12">
        <p class="text-sm leading-6 text-lothlorien-gold">
          To next milestone
        </p>
        <h2 class="sm:text-3xl md:text-4xl font-semibold tracking-tight text-lothlorien-gold">
          {{ remainingDistanceToNextMilestone }} km
        </h2>
      </div>
      <div class="flex-1 flex flex-col justify-center items-center w-full bg-rivendell-blue rounded py-6 px-12">
        <p class="text-sm leading-6 text-lothlorien-gold">
          Distance to Mordor
        </p>
        <h2 class="sm:text-3xl md:text-4xl font-semibold tracking-tight text-lothlorien-gold">
          {{ remainingDistanceToGoal }} km
        </h2>
      </div>
    </div>
  </section>
</template>