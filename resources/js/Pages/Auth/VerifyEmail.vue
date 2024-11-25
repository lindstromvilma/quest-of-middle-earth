<script setup>
import { computed } from 'vue'
import BaseLayout from '@/Layouts/BaseLayout.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
	status: {
		type: String,
	},
})

const form = useForm({})

const submit = () => {
	form.post(route('verification.send'))
}

const verificationLinkSent = computed(() => props.status === 'verification-link-sent')
</script>

<template>
  <BaseLayout>
    <div class="mb-4 text-sm">
      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
      we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>
    <div
      v-if="verificationLinkSent"
      class="mb-4 font-medium text-sm text-shire-green-dark"
    >
      A new verification link has been sent to the email address you provided during registration.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <PrimaryButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Resend Verification Email
        </PrimaryButton>
        <Link
          :href="route('logout')"
          method="post"
          as="button"
          class="text-sm underline-animation"
        >
          Log Out
        </Link>
      </div>
    </form>
  </BaseLayout>
</template>
