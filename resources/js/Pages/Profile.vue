<script setup>
import { usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import BaseLayout from '@/Layouts/BaseLayout.vue'
import UpdateProfileInfoForm from './Profile/UpdateProfileInfoForm.vue'
import UpdatePasswordForm from './Profile/UpdatePasswordForm.vue'
import DeleteUserForm from './Profile/DeleteUserForm.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import DangerButton from '@/Components/DangerButton.vue'

const { props } = usePage()

const user = ref(props.auth.user)

const traveledDistance = ref(user.value.traveled_distance || 0)
const currentMilestone = ref(props.currentMilestone || null)
const isEdit = ref(false)

// toggle edit mode
const toggleEdit = () => {
	isEdit.value = !isEdit.value
}
</script>

<template>
  <BaseLayout>
    <div
      v-if="user"
      class="flex flex-col gap-8 w-full max-w-screen-2xl min-h-screen md:min-h-[800px] md:place-content-center bg-white rounded shadow-md px-6 md:px-12 mx-6 my-6 py-8"
    >
      <div class="flex justify-between items-start w-full md:w-3/4 mx-auto">
        <div class="flex flex-col items-center gap-1">
          <img
            :src="user.photoURL || 'images/frodo.png'"
            alt="Profile Photo"
            class="w-20 h-20 rounded-full object-cover shadow-md p-2"
          />
          <div
            v-if="isEdit"
            class="text-center"
          >
            <span
              class="text-xs font-semibold text-moria-gray cursor-pointer underline-animation mt-2"
              @click="triggerFileInput"
            >
              Change avatar
            </span>
            <input
              id="fileInput"
              type="file"
              accept="image/*"
              class="hidden"
              @change="uploadPhoto"
            />
          </div>
        </div>
        <div class="">
          <SecondaryButton
            v-if="!isEdit"
            @click="toggleEdit"
          >
            Edit Profile
          </SecondaryButton>
          <DangerButton
            v-if="isEdit"
            @click="toggleEdit"
          >
            Cancel
          </DangerButton>
        </div>
      </div>

      <div
        v-if="!isEdit"
        class="flex flex-col gap-1 w-full md:w-3/4 mx-auto"
      >
        <!-- Profile section (view) -->
        <div class="px-4 sm:px-0">
          <h3 class="text-base font-semibold leading-6 text-gray-900">
            Profile Information
          </h3>
          <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
            Manage your personal details and account information.
          </p>
        </div>

        <div class="border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">
                Full name
              </dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ user.name }}
              </dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">
                Email address
              </dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ user.email }}
              </dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">
                Total Distance
              </dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ traveledDistance }} km
              </dd>
            </div>

            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
              <dt class="text-sm font-medium leading-6 text-gray-900">
                Journey status
              </dt>
              <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ currentMilestone?.name || 'Not started' }}
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <!-- Edit section -->
      <div v-if="isEdit">
        <UpdateProfileInfoForm class="flex flex-col gap-8 w-full md:w-3/4 mx-auto" />
        <UpdatePasswordForm class="flex flex-col gap-8 w-full md:w-3/4 mx-auto" />
        <DeleteUserForm class="flex flex-col gap-8 w-full md:w-3/4 mx-auto" />
      </div>
    </div>

    <div v-else>
      <p>User not logged in.</p>
    </div>
  </BaseLayout>
</template>