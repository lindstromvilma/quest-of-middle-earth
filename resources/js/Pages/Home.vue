<script setup>
import { Link } from '@inertiajs/vue3'
import BaseLayout from '@/Layouts/BaseLayout.vue'
import FeatureCard from '@/Components/FeatureCard.vue'
</script>

<template>
  <BaseLayout>
    <div class="w-full">
      <div class="relative bg-cover bg-center bg-no-repeat py-40 text-center bg-[url('/images/map-middle-earth.jpg')]">
        <div class="absolute inset-0 bg-zinc-900 opacity-60 z-10"></div>
        <div class="text-gondor-beige relative z-20 flex flex-col gap-10 sm:mx-12 md:mx-32 xl:mx-80">
          <h1 class="font-almendra text-4xl md:text-5xl font-semibold md:leading-tight">
            “The task was appointed to you. And if you do not find a way, no one will”
          </h1>
          <p class="text-base md:text-lg font-normal max-w-3xl mx-auto">
            It is dangerous business, going out your door... Are you ready for an adventure? <br>
            Your quest is to walk to Mordor and destroy the ring. Track your progress through mystical lands of Middle-earth, conquer milestones along the way and push your limits. From the peaceful Shire to the fiery depths of Mordor, every step brings you closer to achieving the ultimate goal: destroying the One Ring.
          </p>
          <Link
            :href="route('register')"
            class="mx-auto mt-6 font-semibold underline-animation"
          >
            Begin Your Quest
          </Link>
        </div>
      </div>


      <div class="pt-28 pb-32 md:pb-48">
        <div class="container flex flex-col gap-12 mx-auto sm:px-4 lg:px-12">
          <h2 class="font-almendra text-center text-3xl md:text-4xl font-bold">
            Explore the Features
          </h2>
          <div class="flex sm:flex-col gap-6 md:flex-row md:gap-8">
            <FeatureCard
              title="Track progress"
              description="Follow your progress through Middle-earth and see how far you've come."
              icon="stickers/milestone.png"
              section="journey-stats"
            />
            <FeatureCard
              title="Explore"
              description="Discover stories and lore. New chapeters unlock as you progress."
              icon="stickers/path.png"
              section="explore"
            />
            <FeatureCard
              title="Achievements"
              description="Earn achievements as you progress through your journey. Collect them all!"
              icon="stickers/star.png"
              section="achievements"
            />
          </div>
        </div>
      </div>
    </div>
  </BaseLayout>
</template>
