<script setup>
import { router, usePage, Link } from '@inertiajs/vue3'
import NavLink from '@/Components/NavLink.vue'
import LogoutButton from '@/Components/LogoutButton.vue';

const { url, props } = usePage()

const isAuthenticated = props.auth.user ? true : false

const isActive = (href) => {
	return url === href
}

const logout = () => {
	router.post(route('logout'), {}, {
		onSuccess: () => {
			window.location.href = route('home')
		},
		onError: (errors) => {
			console.error('Logout failed:', errors)
		}
	})
}
</script>

<template #header>
  <nav class="flex justify-between items-center bg-moria-gray text-lothlorien-gold shadow-md font-semibold text-sm sm:px-6 sm:py-5 md:px-12 md:py-8">
    <Link
      :href="route('home')"
    >
      <img
        src="/images/one-ring.png"
        alt="Logo"
        class="sm:w-7 sm:h-7 md:w-8 md:h-8 lg:w-9 lg:h-9 object-cover cursor-pointer transform transition-transform duration-300 ease-in-out hover:scale-125"
      />
    </Link>
    <div>
      <ul class="flex gap-4">
        <NavLink
          href="/"
          :active="isActive('/')"
        >
          Home
        </NavLink>
        <NavLink
          v-if="isAuthenticated"
          href="/dashboard"
          :active="isActive('/dashboard')"
        >
          Dashboard
        </NavLink>
        <NavLink
          v-if="isAuthenticated"
          href="/profile"
          :active="isActive('/profile')"
        >
          Profile
        </NavLink>
        <NavLink
          v-if="!isAuthenticated"
          href="/login"
          :active="isActive('/login')"
        >
          Login
        </NavLink>
        <LogoutButton
          v-if="isAuthenticated"
          @click="logout"
        >
          Logout
        </LogoutButton>
      </ul>
    </div>
  </nav>
</template>
