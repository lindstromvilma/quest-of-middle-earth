<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showText = ref(false)
const showImage = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showImage.value = true }, 20)
	setTimeout(() => { showText.value = true }, 400)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="Fellowship of the Ring"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <img
        v-if="showImage"
        src="images/rivendell.png"
        alt="Rivendell"
        class="float-left rounded w-72 md:w-2/5 h-auto mr-4 mb-4 object-cover fade-in-slow"
      />
      <section
        v-if="showText"
        class="fade-in-slow text-justify"
      >
        <p class="text-base">
          Upon arriving in Rivendell, the hobbits were welcomed into a realm of peace and safety. Frodo was in urgent need of healing, and the Elves of Rivendell provided him with the care he desperately required. The Morgul wound inflicted by the Witch-king was severe, but under the attentive care of Elrond and his skilled healers, Frodo's condition slowly improved.
        </p>
        <p class="text-base mt-4">
          As Frodo’s strength began to return, he awoke one morning in a room filled with the gentle light of Rivendell. He was surprised to find Gandalf seated by his bedside. The wizard’s presence was a mixture of relief and solemnity.
        </p>
        <p class="text-base mt-4">
          Later, Frodo was reunited with his uncle, Bilbo Baggins. Bilbo, who had been residing in Rivendell, expressed deep relief and happiness to see Frodo safe. Their reunion was heartwarming, and Bilbo presented Frodo with Sting, his Elvish blade, as a symbol of protection and solidarity. He also gifted Frodo his Mithril shirt, a precious piece of armor that would prove invaluable in the days to come.
        </p>

        <p class="text-base mt-4">
          The time spent in Rivendell was not only for healing but also for important discussions. The Council of Elrond was convened to address the growing threat posed by Sauron and the One Ring. Leaders from various races—Elves, Dwarves, and Men—gathered to discuss the fate of the Ring.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-right mt-10 mb-8">
          “The world is indeed full of peril, and in it there are many dark places; but still there is much that is fair, and though in all lands love is now mingled with grief, it grows perhaps the greater.”
        </blockquote>
        <p class="text-base mt-4">
          At the Council, it was decided that the Ring must be destroyed to prevent Sauron from regaining it. A fellowship was formed to undertake the perilous journey to Mount Doom. The members of the Fellowship included the four hobbits—Frodo, Samwise, Merry, and Pippin. Aragorn, son of Arathorn, swore to defend them with his life with Legolas of the Woodland Realm and Gimli son of Glóin. Boromir of Gondor also joined the Fellowship, along with Gandalf the Grey, who would guide them on their quest.
        </p>
      </section>
    </div>
  </div>
</template>