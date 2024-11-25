<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import BaseLayout from '@/Layouts/BaseLayout.vue'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
	canResetPassword: {
		type: Boolean,
	},
	status: {
		type: String,
	},
})

const form = useForm({
	email: '',
	password: '',
})

const submit = () => {
	form.post(route('login'), {
		onFinish: () => form.reset('password'),
	})
}
</script>

<template>
  <BaseLayout>
    <div class="w-full h-max sm:max-w-md px-8 py-6 my-6 bg-white shadow-md overflow-hidden rounded">
      <div class="mb-8">
        <h2 class="text-xl font-bold mb-1">
          Sign in to your account
        </h2>
        <Link
          v-if="canResetPassword"
          :href="route('register')"
          class="font-medium text-xs text-left underline-animation"
        >
          Don't have an account?
        </Link>
      </div>

      <form
        class="flex flex-col gap-4"
        @submit.prevent="submit"
      >
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
            autofocus
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
            autocomplete="current-password"
          />
          <InputError
            class="mt-2"
            :message="form.errors.password"
          />
        </div>
        <div class="flex items-center justify-end mt-6">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="font-semibold text-xs text-left w-max underline-animation"
          >
            Forgot your password?
          </Link>
          <PrimaryButton
            class="ms-5"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Log in
          </PrimaryButton>
        </div>
      </form>
    </div>
  </BaseLayout>
</template>
