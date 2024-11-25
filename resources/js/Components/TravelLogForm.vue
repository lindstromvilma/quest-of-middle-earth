<script setup>
import { router, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import BaseSelect from '@/Components/BaseSelect.vue'
import DatePicker from '@/Components/DatePicker.vue'
import Checkbox from '@/Components/Checkbox.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const props = defineProps({
	terrains: Array,
})

const terrains = ref(props.terrains)

// unique terrain names
const terrainOptions = Array.from(
	new Set(terrains.value.map(terrain => terrain.name))
)

// weather options
const weatherOptions = [
	'Sunny',
	'Cloudy',
	'Windy',
	'Rainy',
	'Foggy',
	'Snowy',
	'Stormy'
]

const form = useForm({
	distance: '',
	date: '',
	dateRange: [],
	isMultiDay: false,
	terrain: '',
	weather: '',
	sleptOutside: false,
	cookedOnFire: false,
	notes: '',
})

// add travel log entry
const addTravelLogEntry = () => {
	if (form.distance <= 0) {
		form.errors.distance = 'Distance must be greater than zero.'
		return
	}

	form.post(route('entry.add'), {
		preserveScroll: true,
		onSuccess: () => {
			router.visit(route('dashboard'), { preserveScroll: true })
		},
		onError: () => {
			alert('Failed to add distance.')
		},
	})
}
</script>

<template>
  <section class="space-y-10">
    <div class="flex flex-col gap-2">
      <h2 class="text-lg font-semibold">
        Update Travel log
      </h2>
      <div class="flex flex-col gap-4">
        <div class="flex flex-col lg:flex-row gap-4">
          <div class="w-full">
            <InputLabel
              for="distance"
              value="Distance"
              :required="true"
            />
            <TextInput
              id="distance"
              v-model="form.distance"
              placeholder="Enter distance in km"
            />
            <InputError
              class="mt-2"
              :message="form.errors.distance"
            />
          </div>
          <div class="flex gap-4 w-full">
            <div class="w-full">
              <InputLabel value="Date" />
              <DatePicker
                v-if="!form.isMultiDay"
                v-model="form.date"
                :range="false"
                class="cursor-pointer"
              />
              <DatePicker
                v-if="form.isMultiDay"
                v-model="form.dateRange"
                :range="true"
                :placeholder="'Select date range'"
                class="cursor-pointer"
              />
              <InputError
                class="mt-2"
                :message="form.errors.date"
              />
            </div>
            <div class="flex items-center space-x-3 min-w-max mt-5">
              <label
                for="isMultiDay"
                class="text-sm font-medium"
              >
                Multi-day trip?
              </label>
              <Checkbox
                id="isMultiDay"
                v-model:checked="form.isMultiDay"
                value="true"
              />
            </div>
          </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between gap-4">
          <div class="w-full">
            <InputLabel
              for="terrain"
              value="Terrain"
            />
            <BaseSelect
              id="terrain"
              v-model="form.terrain"
              :options="terrainOptions"
              :default-value="'Select terrain'"
            />
            <InputError
              class="mt-2"
              :message="form.errors.terrain"
            />
          </div>
          <div class="w-full">
            <InputLabel
              for="weather"
              value="Weather"
            />
            <BaseSelect
              id="weather"
              v-model="form.weather"
              :options="weatherOptions"
              :default-value="'Select weather'"
            />
            <InputError
              class="mt-2"
              :message="form.errors.weather"
            />
          </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between gap-4">
          <div class="flex flex-row items-center gap-4 w-full">
            <label
              for="sleptOutside"
              class="text-sm font-medium"
            >
              Did you sleep outdoors during your trip? <br />
              <span class="text-xs text-neutral-400">(e.g., camping, under the stars)</span>
            </label>
            <Checkbox
              id="sleptOutside"
              v-model:checked="form.sleptOutside"
              value="true"
            />
          </div>
          <div class="flex flex-row items-center gap-4 w-full">
            <label
              for="cookedOnFire"
              class="text-sm font-medium"
            >
              Did you cook over an open flame? <br />
              <span class="text-xs text-neutral-400">(e.g., campfire or campstove)</span>
            </label>
            <Checkbox
              id="cookedOnFire"
              v-model:checked="form.cookedOnFire"
              value="true"
            />
          </div>
        </div>
        <div class="w-full">
          <InputLabel
            for="notes"
            value="Notes"
          />
          <TextInput
            id="notes"
            v-model="form.notes"
            placeholder="Add notes about your trip"
          />
          <InputError
            class="mt-2"
            :message="form.errors.notes"
          />
        </div>
        <PrimaryButton
          class="self-end"
          @click="addTravelLogEntry"
        >
          Add
        </PrimaryButton>
      </div>
    </div>
  </section>
</template>
