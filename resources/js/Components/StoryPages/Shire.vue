<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showImage = ref(false)
const showText = ref(false)
const showRing = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showImage.value = true }, 20)
	setTimeout(() => { showText.value = true }, 400)
	setTimeout(() => { showRing.value = true }, 600)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="The road goes ever on, and I must follow if I can"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <img
        v-if="showImage"
        src="images/shire-image.jpg"
        alt="The Shire"
        class="float-left rounded w-72 md:w-2/5 mr-4 object-cover fade-in-slow"
      />
      <section
        v-if="showText"
        class="fade-in-slow text-justify"
      >
        <p class="text-base">
          In the heart of the Shire, where rolling hills and verdant fields stretch as far as the eye can see, our tale begins. This tranquil land, cradled in a timeless peace, is home to the Hobbits—a folk who cherish the beauty of their surroundings and the simplicity of their way of life. Long have they lived in harmony with the land, tending to their gardens, enjoying good food, and sharing stories of old. Yet beyond these rolling hills and lush fields, the world is changing. Shadows of the past are stirring once more.
        </p>
        <p class="text-base mt-4">
          Once, the Great Rings were forged by the Elven-smiths of old. Three were given to the Elves, immortal, wisest, and fairest of all beings. Seven to the Dwarf-lords, great miners and craftsmen of the mountain halls. And nine rings were gifted to the race of men. But those who were gifted were deceived, for another ring was made—one ring to rule them all. But the ring was lost, and for centuries, it lay forgotten.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-center mt-8 mb-8">
          “And some things that should not have been forgotten were lost.”
        </blockquote>
        <img
          v-if="showRing"
          src="images/one-ring.png"
          alt="The One Ring"
          class="float-right rounded w-20 h-20 ml-4 mt-4 object-cover fade-in-slow"
        />
        <p class="text-base mt-4">
          Until it was found again. Through many unexpected events, the Ring found its way into the possession of Bilbo Baggins. Unaware of its true nature, Bilbo kept the Ring in secrecy for many years. But as time passed, the Ring's dark power began to stir once more, and it started to seek ways to return to its master. Bilbo's nephew, Frodo Baggins, inherits this ominous trinket. Little does he know that the fate of Middle-earth now rests on his shoulders.
        </p>
        <p class="text-base mt-4">
          Whit the quidance of Gandalf the Gray, Frodo learns of the Ring's true nature and the peril it poses to all who dwell in Middle-earth. The only way to prevent the Dark Lord Sauron from reclaiming his prize is to destroy the Ring in the fires of Mount Doom, where it was forged. And so, Frodo sets out on a perilous journey, accompanied by Samwise Gamgee, Meriadoc Brandybuck, and Peregrin Took, his loyal friends and companions.
        </p>
        <p class="text-base mt-4">
          As the Shire is soon to be left behind, the journey to destroy the One Ring begins. The path ahead will be fraught with unknown perils that will test every ounce of courage and resolve. Yet, in the darkest of times, hope endures. For the road goes ever on, and those who dare to follow it may yet find the light that shines in the shadows.
        </p>
      </section>
    </div>
  </div>
</template>