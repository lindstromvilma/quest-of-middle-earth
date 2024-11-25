<script setup>
import { ref } from 'vue'
import TypewriterHeading from '../TypewriterHeading.vue'

const showText = ref(false)
const showImage = ref(false)
const showBalrog = ref(false)

// method to handle the completion of the typewriter effect
const onTypewriterComplete = () => {
	setTimeout(() => { showText.value = true }, 20)
	setTimeout(() => { showImage.value = true }, 200)
	setTimeout(() => { showBalrog.value = true }, 400)
}
</script>

<template>
  <div class="px-2 md:px-10 xl:px-32 py-4 md:py-12 xl:py-20 md:shadow-inner overflow-y-scroll no-scrollbar">
    <TypewriterHeading
      class="font-almendra text-center text-4xl font-bold mb-12"
      text="Through The Misty Mountains"
      :typing-speed="50"
      @complete="onTypewriterComplete"
    />
    <div class="relative">
      <section
        v-if="showText"
        class="fade-in-slow text-justify"
      >
        <p class="text-base">
          As the Fellowship ventured into the wilds of Middle-earth, their path led beyond the Misty Mountains, where two choices awaited: to go through snowy peaks of Caradhras or the dark halls of Moria. Though Gandalf, heavy-hearted, wished to avoid the Mines, the treacherous weather on Caradhras forced their way to Khazad-dûm.
        </p>
        <img
          v-if="showImage"
          src="images/moria.png"
          alt="Gates of Moria"
          class="float-right rounded w-72 md:w-2/5 h-auto mt-4 ml-4 mb-4 object-cover fade-in-slow"
        />
        <p class="text-base mt-4">
          So they found themselves at the secret gate of Moria, the Doors of Durin. Gandalf tried to open the gate. Though he was wise and wielded knowledge of the ancient languages, struggled to recall the password. The tension grew as hours passed and the sky darkened. Finally, it came to him: the inscription on the door “Speak, friend, and enter” had password hidden in plain sight. He uttered the word, “Mellon” and the doors swung open, revealing the dark halls of Moria.
        </p>
        <blockquote class="font-almendra text-2xl font-semibold text-center mt-10 mb-8">
          “Speak, friend, and enter.”
        </blockquote>
        <p class="text-base mt-4">
          Once inside the Mines of Moria, the Fellowship was plunged into darkness. The once-great halls of Khazad-dûm, now silent and filled with shadows, echoed with the faint sounds of their footsteps. Their path was lit only by Gandalf's staff, casting eerie flickers of light that danced on the ancient stone walls. As they ventured deeper, it became clear that Moria was no longer a safe haven that it had once been.
        </p>
        <p class="text-base mt-4">
          Their presence had not gone unnoticed. The drums of Moria echoed in the distance—"Doom, doom, doom"—and they grew louder and louder as the goblins and orcs stirred. The Fellowship tried to flee, but they soon found themselves surrounded. But something darker stirred closer. A shadow in the darkness, vast and terrible, and with it came an overwhelming heat. Suddenly the goblins scattered in terror. Gandalf’s face turned grim as he realized what was coming: a Balrog, a demon of the ancient world. Now they were in hurry to escape the Mines of Moria.
        </p>
        <img
          v-if="showBalrog"
          src="images/balrog.png"
          alt="Balrog and Gandalf"
          class="float-left rounded w-full h-auto mt-4 mb-10 object-cover fade-in-slow"
        />
        <blockquote class="font-almendra text-2xl font-semibold text-center mt-10 mb-8">
          “I am a servant of the Secret Fire, wielder of the flame of Anor. You cannot pass.”
        </blockquote>
        <p class="text-base mt-4">
          At the Bridge of Khazad-dûm, the Fellowship made their final stand. As they crossed, Gandalf turned to face the Balrog. His voice boomed with power, his staff in hand. “You cannot pass!” he cried, standing as a shield between the creature and his companions. The Balrog, with its fiery whip, lunged at the wizard, but Gandalf struck the bridge, shattering it and sending the demon plummeting into the abyss. But as the Balrog fell, its whip lashed out, catching Gandalf by the leg. “Fly, you fools!” Gandalf shouted as he was dragged into the chasm. The Fellowship watched in horror as their guide and protector disappeared into the depths. Devastated, they fled the Mines, emerging into the light of day but weighed down by their grief.
        </p>
        <p class="text-base mt-4">
          Without Gandalf to lead them, the Fellowship felt lost and vulnerable. But they had no time to mourn. Aragorn, though stricken with sorrow, knew that they must press on. He urged the group forward.
        </p>
      </section>
    </div>
  </div>
</template>