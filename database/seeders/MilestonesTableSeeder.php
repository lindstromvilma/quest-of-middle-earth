<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilestonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
			$milestones = [
					[
							'name' => 'The Shire (Hobbiton) to Bree',
							'distance_to_next_milestone' => 220,
							'total_distance_at_milestone' => 220,
							'terrains' => 'Rolling hills, farmland, small villages, forests (Old Forest)',
							'description' => 'The journey begins in the tranquil and picturesque Shire, home of the Hobbits. Frodo, Sam, Merry, and Pippin leave Hobbiton and travel through the countryside, encountering the eerie Old Forest and the malevolent Barrow-wights before reaching the bustling village of Bree, where they meet Aragorn (Strider) at the Prancing Pony inn.',
							'action' => 'Upon reaching the lively village of Bree and arriving at the famed Prancing Pony inn, indulge in a well-earned pint of ale. This moment reflects the joy and relief the Fellowship must have felt as they arrived at a place of rest and camaraderie.',
					],
					[
							'name' => 'Bree to Rivendell',
							'distance_to_next_milestone' => 480,
							'total_distance_at_milestone' => 700,
							'terrains' => 'Marshes (Midgewater Marshes), hills (Weathertop), forests (Trollshaws), valleys',
							'description' => 'From Bree, the group travels through the dangerous Midgewater Marshes and has a perilous encounter with the Nazgûl at Weathertop. They then journey through the Trollshaws, facing various challenges, before being rescued by the Elf-lord Glorfindel (or Arwen in the movie) and arriving at the hidden valley of Rivendell, a place of refuge and healing.',
							'action' => 'Once you reach Rivendell, treat yourself to a luxurious and relaxing evening, reminiscent of the peaceful sanctuary Elrond provides.',
					],
					[
							'name' => 'Rivendell to Lothlórien',
							'distance_to_next_milestone' => 670,
							'total_distance_at_milestone' => 1370,
							'terrains' => 'Mountain passes (Misty Mountains), dark underground halls (Mines of Moria), lush forests (Lothlórien)',
							'description' => 'The Fellowship sets out from Rivendell and crosses the treacherous Misty Mountains via the Redhorn Pass, only to be forced to go through the dark and dangerous Mines of Moria. After a harrowing journey through Moria and the loss of Gandalf, they find solace and respite in the enchanted forest of Lothlórien, under the care of Galadriel and Celeborn.',
							'action' => 'When you arrive in Lothlórien, have a small, tranquil picnic in a peaceful, wooded area. Take time to simply appreciate nature, much like the Fellowship did under the golden leaves of the mallorn trees.',
					],
					[
							'name' => 'Lothlórien to Rauros Falls',
							'distance_to_next_milestone' => 350,
							'total_distance_at_milestone' => 1720,
							'terrains' => 'Great River (Anduin), wooded riverbanks, waterfalls',
							'description' => 'Departing from Lothlórien, the Fellowship travels down the Great River Anduin by boat. They pass through the Argonath (Pillars of the Kings) and reach the Rauros Falls, where the Fellowship ultimately breaks. Boromir succumbs to the lure of the Ring, and Frodo and Sam decide to continue their journey alone.',
							'action' => 'Find a nearby river, lake, or even a pond and take a moment to reflect on the journey so far. Consider a short, refreshing swim or simply dip your feet in the water.',
					],
					[
							'name' => 'Rauros Falls to Emyn Muil',
							'distance_to_next_milestone' => 60,
							'total_distance_at_milestone' => 1780,
							'terrains' => 'Rocky hills, rough terrain',
							'description' => 'Frodo and Sam navigate the rough and confusing terrain of the Emyn Muil. It is a challenging and disorienting landscape, but they manage to find their way with the reluctant help of Gollum, who becomes their guide.',
							'action' => 'Challenge yourself to a small navigation exercise in a local park or nature reserve. Use a map and compass to find your way through a trail or path, symbolizing Frodo and Sam’s struggle through Emyn Muil.',
					],
					[
							'name' => 'Emyn Muil to the Dead Marshes',
							'distance_to_next_milestone' => 80,
							'total_distance_at_milestone' => 1860,
							'terrains' => 'Treacherous marshlands',
							'description' => 'Gollum leads Frodo and Sam through the haunting and perilous Dead Marshes. The landscape is eerie and filled with the ghostly remains of fallen warriors, adding to the danger of the journey.',
							'action' => 'Take a nighttime walk with a lantern or flashlight, reflecting the eerie atmosphere of the Dead Marshes. Be mindful of the surroundings and take it slow, experiencing the mysterious ambiance.',
					],
					[
							'name' => 'Dead Marshes to the Black Gate',
							'distance_to_next_milestone' => 160,
							'total_distance_at_milestone' => 2020,
							'terrains' => 'Open plains, arid and barren lands',
							'description' => 'After crossing the Dead Marshes, they make their way across the open, barren lands towards the Black Gate of Mordor. The area is heavily patrolled by Orcs, making it a dangerous approach.',
							'action' => 'Take a stealthy hike, mimicking the careful and strategic movements needed to avoid detection at the Black Gate. Focus on quiet, deliberate steps and staying low and out of sight.',
					],
					[
							'name' => 'Black Gate to Ithilien',
							'distance_to_next_milestone' => 120,
							'total_distance_at_milestone' => 2140,
							'terrains' => 'Wooded areas, rolling hills, hidden paths',
							'description' => 'Realizing they cannot enter Mordor through the heavily guarded Black Gate, Gollum leads Frodo and Sam south into Ithilien. This region is more fertile and less desolate, and they briefly experience some respite from their harsh journey. They encounter Faramir and his men here.',
							'action' => 'Have a picnic with fresh, local produce to celebrate the fertile and lush lands of Ithilien. Consider including some hearty, wholesome food, reminiscent of the simple yet nourishing meals enjoyed by the characters.',
					],
					[
							'name' => 'Ithilien to Cirith Ungol',
							'distance_to_next_milestone' => 200,
							'total_distance_at_milestone' => 2340,
							'terrains' => 'Rocky paths, steep climbs, dark tunnels',
							'description' => 'The journey continues towards the secret pass of Cirith Ungol, where they must navigate treacherous paths and face the horror of Shelob, the giant spider. The terrain is difficult and foreboding, marking one of the darkest parts of their journey.',
							'action' => 'Plan a small yet challenging hike or climb, symbolizing the difficult ascent to Cirith Ungol. Reflecting on the perseverance needed by Frodo and Sam.',
					],
					[
							'name' => 'Cirith Ungol to Mount Doom',
							'distance_to_next_milestone' => 80,
							'total_distance_at_milestone' => 2420,
							'terrains' => 'Volcanic landscape, ash plains',
							'description' => 'Frodo and Sam make their final push across the plains of Gorgoroth to reach Mount Doom. The terrain is harsh and volcanic, filled with ash and smoke. This last leg is the most grueling, as they are exhausted and desperate, but ultimately they reach the Crack of Doom where the Ring is finally destroyed.',
							'action' => 'At the culmination of your journey, plan a short hike to place where you can execute destruction of the Ring. Safely burn the wooden ring in the fire, symbolizing the destruction of the One Ring. Reflect on your entire journey and celebrate your achievement.',
					],
			];

			DB::table('milestones')->insert($milestones);
    }
}
