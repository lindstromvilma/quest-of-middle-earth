<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showImage = ref(false)
const showText = ref(false)
const showStriderImage = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showImage.value = true }, 20)
	setTimeout(() => { showText.value = true }, 400)
	setTimeout(() => { showStriderImage.value = true }, 600)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="A pint of peace in Prancing Pony"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <img
        v-show="showImage"
        src="images/bree-map.jpg"
        alt="Strider in Prancing Pony"
        class="float-left rounded w-full h-80 mr-4 mb-4 object-cover object-center fade-in-slow"
      />
      <section
        v-show="showText"
        class="fade-in-slow text-justify"
      >
        <p class="text-base mt-4">
          The rain-soaked streets of Bree greeted the weary hobbits as they sought shelter in the Prancing Pony. Despite their anxiety, the inn’s warmth and bustling common room brought a brief comfort. The air was thick with the smell of ale and pipe smoke, and for a fleeting moment, it almost felt safe.
        </p>
        <p class="text-base mt-4">
          But there was no sign of Gandalf, and a creeping sense of unease settled in. The innkeeper, Barliman Butterbur, was kind enough, but his absentmindedness only deepened their concern. Frodo, in particular, found it hard to shake the feeling that they were being watched.
        </p>
        <img
          v-show="showStriderImage"
          src="images/strider.jpg"
          alt="Strider in Prancing Pony"
          class="float-left rounded w-72 md:w-2/5 h-auto mr-4 mt-4 object-cover fade-in-slow"
        />
        <p class="text-base mt-4">
          Trying to stay unnoticed, Frodo attempted to blend into the lively crowd. Yet, it was impossible to avoid attention. Their arrival had not gone unnoticed, and more than one pair of eyes seemed to linger on the travelers. A tall, cloaked figure sitting in the shadows was the most unsettling. He watched them with a keen, almost predatory gaze.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-left mt-8 mb-8">
          “Are you frightened? Not nearly frightened enough. I know what hunts you.”
        </blockquote>
        <p class="text-base mt-4 text-balance">
          The stranger eventually introduced himself as Strider, a Ranger from the North. His weathered appearance and piercing eyes unnerved the hobbits, especially Sam, but Strider spoke with a quiet authority that demanded attention. He offered his protection, warning them of the great danger they were in—the Black Riders had already entered Bree.
        </p>
      </section>
    </div>
  </div>
</template>
