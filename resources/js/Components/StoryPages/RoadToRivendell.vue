<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showText = ref(false)
const showImage = ref(false)
const showBruinenImage = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showText.value = true }, 20)
	setTimeout(() => { showImage.value = true }, 400)
	setTimeout(() => { showBruinenImage.value = true }, 600)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="Shadows on the Road"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <section
        v-if="showText"
        class="fade-in-slow text-justify"
      >
        <p class="text-base">
          As dawn broke over Bree, the hobbits and Strider left the town behind. There was no sign of the Black Riders, but the air was thick with tension, and every rustle in the wind seemed to carry a threat. Strider led them swiftly but carefully, away from the main road, deeper into the wilds.
        </p>
        <p class="text-base mt-4">
          Their paht led them through the Midgewater Marshes, a desolate and dangerous place. The hobbits struggled to keep up with Strider, who seemed to move with the ease of one who knew the land well. Along the way, they passed the stone trolls, a silent reminder of Bilbo's tales and the adventures of old.
        </p>
        <img
          v-if="showImage"
          src="images/amon-sul.jpg"
          alt="Amon Sûl"
          class="float-right rounded w-72 md:w-2/5 h-auto ml-4 my-4 object-cover fade-in-slow"
        />
        <p class="text-base mt-4">
          After days of travel, they reached Weathertop, ruins of an ancient watchtower that stood on a hill overlooking the land. Ruins offered little shelter, but it was a strategic vantage point, and Strider hoped to find a sign of Gandalf there.
        </p>
        <p class="text-base mt-4">
          They decided to camp at Weathertop, despite the danger. Strider kept watch through the night, and the hobbits tried to rest. But the night was not peaceful. The Black Riders found them, and they attacked the camp in the dead of night. In the chaos of the assault, Frodo was wounded by the Witch-king’s Morgul blade.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-left mt-10 mb-8">
          “And as they went on, a darkness came over the land, and they felt the weight of the world upon their shoulders.”
        </blockquote>
        <p class="text-base mt-4">
          With Frodo wounded, Strider knew they had to move quickly. The wound was deadly, and the Black Riders would not stop until they had the Ring. With Frodo’s condition worsening, Strider used Athelas to ease Frodo’s pain, and they pressed on, hoping to get Frodo to safety and heal his wound. Their only hope now was to reach Rivendell before it was too late.
        </p>
        <p class="text-base mt-4">
          Just as their hope seemed to be fading, Glorfindel, an Elf-lord from Rivendell, had come to their aid. He lifted Frodo onto his horse, Asfaloth, and rode swiftly towards the Ford of Bruinen, with the Black Riders in pursuit.
        </p>
        <p class="text-base mt-4">
          As they reached the Ford of Bruinen, the Black Riders were closing in. Glorfindel, with his swift horse Asfaloth, led the charge, guiding Frodo towards safety. The scene at the Ford was both dramatic and desperate; the river rose in a sudden flood, summoned by Elvish magic, which swept the Black Riders away.
        </p>
        <img
          v-if="showBruinenImage"
          src="images/ford-bruinen.png"
          alt="Ford of Bruinen"
          class="float-left rounded w-full h-80 mr-4 mt-4 object-cover object-center fade-in-slow"
        />
      </section>
    </div>
  </div>
</template>