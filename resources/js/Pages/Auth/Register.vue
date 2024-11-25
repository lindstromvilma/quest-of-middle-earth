<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
	name: '',
	email: '',
	password: '',
	password_confirmation: '',
})

const submit = () => {
	form.post(route('register'), {
		onFinish: () => form.reset('password', 'password_confirmation'),
	})
}
</script>

<template>
  <BaseLayout>
    <div class="w-full h-max sm:max-w-md px-8 py-6 my-6 bg-white shadow-md overflow-hidden rounded">
      <div class="mb-8">
        <h2 class="text-xl font-bold mb-1">
          Create an account
        </h2>
        <p class="font-semibold text-xs text-left">
          ...and start your adventure!
        </p>
      </div>
      <form
        class="flex flex-col gap-4"
        @submit.prevent="submit"
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

        <div>
          <InputLabel
            for="password"
            value="Password"
          />
          <TextInput
            id="password"
            v-model="form.password"
            type="password"
            class="mt-1 block w-full"
            required
            autocomplete="new-password"
          />
          <InputError
            class="mt-2"
            :message="form.errors.password"
          />
        </div>

        <div>
          <InputLabel
            for="password_confirmation"
            value="Confirm Password"
          />
          <TextInput
            id="password_confirmation"
            v-model="form.password_confirmation"
            type="password"
            class="mt-1 block w-full"
            required
            autocomplete="new-password"
          />
          <InputError
            class="mt-2"
            :message="form.errors.password_confirmation"
          />
        </div>

        <div class="flex items-center justify-end mt-6">
          <Link
            :href="route('login')"
            class="font-medium text-xs underline-animation"
          >
            Already registered?
          </Link>
          <PrimaryButton
            class="ms-5"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
      </form>
    </div>
  </BaseLayout>
</template>