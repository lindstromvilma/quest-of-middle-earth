<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import MilestoneCard from '@/Components/MilestoneCard.vue'
</script>

<template>
  <BaseLayout>
    <div class="flex flex-col gap-8 w-full max-w-screen-2xl sm:px-6 sm:py-8 md:px-12 md:py-8 mx-6 my-6">
      <h1 class="text-4xl md:text-5xl font-bold text-center font-almendra md:leading-tight">
        “One does not simply walk into Mordor”
      </h1>
      <p class="text-base leading-relaxed text-center max-w-4xl mx-auto">
        Welcome to your very own legendary journey to destroy the One Ring. Inspired by the rich world
        of J.R.R. Tolkien’s Middle-earth, this app guides you through an immersive adventure, tracking
        your progress along the path.
      </p>

      <div class="flex flex-col gap-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center font-almendra">
          Milestones
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mx-auto">
          <MilestoneCard
            title="The Shire (Hobbiton)"
            content="Begin your journey in the peaceful Shire. Experience the lush green hills, and prepare for the adventure ahead."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/shire.jpg"
          />
          <MilestoneCard
            title="Bree"
            content="Arrive at Bree, the bustling village where different folk of Middle-earth converge. Visit the Prancing Pony inn."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/bree.jpg"
          />
          <MilestoneCard
            title="Rivendell"
            content="Reach Rivendell, the hidden valley of the Elves. Rest and seek wisdom before continuing your quest."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/rivendell.jpg"
          />
          <MilestoneCard
            title="Lothlórien"
            content="Enter Lothlórien, the golden wood of the Elves. Feel the serenity and magic of this ancient forest."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/lothlorien.jpg"
          />
          <MilestoneCard
            title="Rauros Falls"
            content="Stand by the great Rauros Falls. Reflect on the journey so far as you face the decision to continue the quest alone."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/rauros-falls.jpg"
          />
          <MilestoneCard
            title="Emyn Muil"
            content="Navigate the treacherous hills of Emyn Muil. Rely on your determination as you face the challenge of this rugged terrain."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/emyn-muil.jpg"
          />
          <MilestoneCard
            title="The Dead Marshes"
            content="Cross the eerie Dead Marshes. Watch your step as the haunting reflections of the past draw you in."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/dead-marshes.jpg"
          />
          <MilestoneCard
            title="The Black Gate"
            content="Stand before the Black Gate of Mordor. Gather your courage for the final leg of your journey."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/black-gate.jpg"
          />
          <MilestoneCard
            title="Ithilien"
            content="Explore the green lands of Ithilien. Find respite in this beautiful region and meet the men of Gondor."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/ithilien.jpg"
          />
          <MilestoneCard
            title="Cirith Ungol"
            content="Brave the dark and perilous path of Cirith Ungol. Prepare for the final challenge before reaching your destination."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/cirith-ungol.jpg"
          />
          <MilestoneCard
            title="Mount Doom"
            content="Arrive at Mount Doom, the end of your journey. Destroy the One Ring and complete your quest."
            background-color="bg-white"
            text-color="text-gray-800"
            image="images/mount-doom.jpg"
          />
        </div>
      </div>

      <div class="flex flex-col gap-4">
        <h2 class="text-3xl md:text-4xl font-semibold text-center mt-8 font-almendra">
          Your Journey with Us
        </h2>
        <p class="text-base leading-relaxed text-center max-w-4xl mx-auto">
          <strong>Photo Log:</strong> Capture your adventure by taking photos along the way. Organize
          them in folders corresponding to each milestone to document your progress and memories.
        </p>
        <p class="text-base leading-relaxed text-center max-w-4xl mx-auto">
          <strong>The Wooden Ring:</strong> Carry a symbolic wooden ring during your journey as a
          reminder of your quest. At the end, ceremoniously burn it to mark the destruction of the One
          Ring.
        </p>
        <p class="text-base leading-relaxed text-center max-w-4xl mx-auto">
          <strong>Thematic Activities:</strong> Enhance your experience with a Middle-earth music
          playlist and revisit "The Lord of the Rings" trilogy. Sync your reading or listening with your
          journey milestones to deepen your immersion.
        </p>
      </div>
      <div class="flex flex-col gap-4">
        <h2 class="text-3xl md:text-4xl font-semibold text-center mt-8 font-almendra">
          Join the Quest
        </h2>
        <p class="text-2xl font-semibold text-center font-almendra">
          “All we have to decide is what to do with the time that is given us.”
        </p>
        <p class="text-base leading-relaxed text-center max-w-4xl mx-auto">
          Embark on this legendary journey and track your progress through the epic landscapes of
          Middle-earth. Celebrate each milestone, reflect on the challenges, and enjoy the adventure of
          a lifetime!
        </p>
      </div>
    </div>
  </BaseLayout>
</template>
