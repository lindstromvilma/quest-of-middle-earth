<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

const user = usePage().props.auth.user

const form = useForm({
	name: user.name,
	email: user.email,
})
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-semibold">
        Profile Information
      </h2>
      <p class="mt-1 text-sm">
        Update your account's profile information and email address.
      </p>
    </header>

    <form
      class="space-y-6"
      @submit.prevent="form.patch(route('profile.update'))"
    >
      <div>
        <InputLabel
          for="name"
          value="Name"
        />
        <TextInput
          id="name"
          v-model="form.name"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="name"
        />
        <InputError
          class="mt-2"
          :message="form.errors.name"
        />
      </div>

      <div>
        <InputLabel
          for="email"
          value="Email"
        />
        <TextInput
          id="email"
          v-model="form.email"
          type="email"
          class="mt-1 block w-full"
          required
          autocomplete="username"
        />
        <InputError
          class="mt-2"
          :message="form.errors.email"
        />
      </div>

      <div class="flex items-center justify-end">
        <PrimaryButton :disabled="form.processing">
          Save changes
        </PrimaryButton>
        <Transition
          enter-active-class="transition ease-in-out"
          enter-from-class="opacity-0"
          leave-active-class="transition ease-in-out"
          leave-to-class="opacity-0"
        >
          <p
            v-if="form.recentlySuccessful"
            class="text-sm"
          >
            Saved successfully
          </p>
        </Transition>
      </div>
    </form>
  </section>
</template>
