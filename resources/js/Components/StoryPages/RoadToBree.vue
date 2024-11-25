<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showText = ref(false)
const showImage = ref(false)
const showNazgulImage = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showText.value = true }, 20)
	setTimeout(() => { showImage.value = true }, 400)
	setTimeout(() => { showNazgulImage.value = true }, 600)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="The home is behind, the world ahead"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <section
        v-if="showText"
        class="fade-in-slow text-justify"
      >
        <img
          v-if="showImage"
          src="images/tom-bombadil.jpg"
          alt="Tom Bombadil"
          class="float-right rounded w-72 md:w-2/5 h-auto ml-4 object-cover fade-in-slow"
        />
        <p class="text-base">
          Into the unknown, the hobbits journeyed, farther from home than they had ever been. Not long after Sam expressed his wish to meet elves, they were fortunate to encounter a company of High Elves, led by Gildor Inglorion. The Elves offered words of caution and comfort. Under the stars, they shared a meal, and for a brief moment, the hobbits felt safe, wrapped in the mystery and grace of their hosts. But when morning came, the Elves and hobbits parted ways.
        </p>
        <p class="text-base mt-4">
          Through the Old Forest they went, where they met Tom Bombadil. A joyful man, whose laughter echoed through the trees. He spoke in riddles and rhyme, and his eyes twinkled with ancient wisdom. Together with his wife Goldberry, they welcomed the travelers to their home. For a brief time, they rested there, free from the troubles of the world.
        </p>
        <p class="text-base mt-4">
          However, Gildor's warning lingered in their minds. The Black Riders—servants of the Dark Lord—were searching for the Ring. No fires were lit at night, for they feared eyes watching from the shadows.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-center mt-8 mb-8">
          “Where they tread, the grass withers and dies; all living things shrink from them in fear.”
        </blockquote>
        <img
          v-if="showNazgulImage"
          src="images/nazgul.png"
          alt="Nazgûl"
          class="float-left rounded w-72 md:w-2/5 h-auto mr-4 object-cover object-center fade-in-slow"
        />
        <p class="text-base mt-4">
          The hobbits raced towards the Bucklebury Ferry, their hearts pounding with fear. Frodo and Sam pushed the ferry into the water as Merry came running from the shadows, leaping onto the ferry just in time. Behind them, the thundering hooves of the Dark Riders drew closer, their black cloaks billowing like shadows over the ground.
        </p>
        <p class="text-base mt-4 ">
          As the ferry drifted into the river, the hobbits cast fearful glances back. Though they could not see them clearly, the sound of hooves on the far bank, and the eerie sniffing of the Dark Riders, echoed across the water. The river, cold and wide, gave them a brief, precious reprieve from their pursuers.
        </p>
        <p class="text-base mt-4">
          With the danger at their backs, they pressed onward to Bree, seeking refuge in the Prancing Pony, where Gandalf had promised to meet them.
        </p>
      </section>
    </div>
  </div>
</template>