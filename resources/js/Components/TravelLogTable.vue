<script setup>
import { usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import Pagination from '@/Components/Pagination.vue'
import XMark from './Icons/XMark.vue'

const { props } = usePage()

const travelLog = ref(props.travelLog || [])
const perPage = ref(7)

const currentPage = ref(1)

// calculate the paginated entries
const paginatedEntries = computed(() => {
	const start = (currentPage.value - 1) * perPage.value
	const end = start + perPage.value
	return travelLog.value.slice(start, end)
})

// calculate the total number of entries
const totalEntries = computed(() => travelLog.value.length)

// check if pagination is needed
const showPagination = computed(() => totalEntries.value > perPage.value)

// delete travel log entry
const deleteEntry = (index) => {
	const entryId = paginatedEntries.value[index].id
	router.delete(route('entry.delete', entryId), {
		preserveScroll: true,
		onSuccess: () => {
			router.visit(route('dashboard'), { preserveScroll: true })
		},
		onError: () => {
			alert('Failed to delete entry.')
		}
	})
}

// Format date to a more readable format
const formatDate = (dateString) => {
	const options = { year: 'numeric', month: 'short', day: 'numeric' }
	return new Date(dateString).toLocaleDateString(undefined, options)
}
</script>

<template>
  <section class="space-y-10">
    <div class="overflow-hidden">
      <p
        v-if="totalEntries === 0"
        class="text-center py-4 text-gray-500"
      >
        No entries in Travel log
      </p>
      <table
        v-else
        class="min-w-full divide-y divide-gray-100"
      >
        <thead>
          <tr>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Distance
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Terrain
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Weather
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Slept Outside
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Cooked on Fire
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-start text-xs font-medium text-gray-400 uppercase"
            >
              Notes
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <tr
            v-for="(entry, index) in paginatedEntries"
            :key="entry.id"
            class="hover:bg-gondor-light"
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.is_multi_day ? `${formatDate(entry.start_date)} - ${formatDate(entry.end_date)}` : formatDate(entry.date) }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.distance }} km
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.terrain || '-' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.weather || '-' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.slept_outside ? 'Yes' : 'No' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.cooked_on_fire ? 'Yes' : 'No' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              {{ entry.notes || '-' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap float-end">
              <button
                type="button"
                class="flex self-end font-bold rounded-lg border border-transparent text-mordor-red hover:text-mordor-red-dark"
                @click="deleteEntry(index)"
              >
                <XMark class="h-5 stroke-2" />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <Pagination
        v-if="showPagination"
        v-model:modelValue="currentPage"
        class="mt-6"
        :total-entries="totalEntries"
        :per-page="perPage"
      />
    </div>
  </section>
</template>

