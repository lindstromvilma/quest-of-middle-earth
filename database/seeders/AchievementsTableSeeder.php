<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
				$achievements = [
						[
							'name' => 'Baby steps',
							'description' => 'You’ve taken your first step on the journey. Keep logging your travels to unlock more achievements.',
							'short_description' => 'Log your first walk to Travel log.',
							'trigger' => 'totalEntries >= 1',
							'icon' => 'baby-steps.png',
						],
						[
								'name' => 'Ring-Bearer',
								'description' => "You’ve carried the One Ring to its final destination, traveling the perilous path from the Shire to Mordor. Middle-earth is forever in your debt.",
								'short_description' => "Walk from the Shire to Mordor.",
								'trigger' => "totalDistance >= 2420",
								'icon' => 'one-ring.png',
						],
						[
								'name' => 'Fellowship of the Walk',
								'description' => "Like the Fellowship, your journey is marked by camaraderie and persistence. Log 300 entries and prove that no journey is too long.",
								'short_description' => "Log 300 entries to Travel log.",
								'trigger' => "totalEntries >= 300",
								'icon' => 'compass.png',
						],
						[
								'name' => 'Through the Mines',
								'description' => "You have braved the treacherous paths of the mountains, much like the Fellowship through Moria. Travel at least 50 km in mountainous terrain.",
								'short_description' => "Walk 50 km in mountainous terrain.",
								'trigger' => "mountainousTerrain >= 50",
								'icon' => 'cave.png',
						],
						[
								'name' => 'Leaf of Lothlórien',
								'description' => "The beauty and mystery of the ancient forests accompany your journey. Walk 50 km in forested terrain, and the Elves of Lothlórien will guide your way.",
								'short_description' => "Walk 50 km in forested terrain.",
								'trigger' => "forestedTerrain >= 50",
								'icon' => 'leaf.png',
						],
						[
								'name' => 'Swift as a Ranger',
								'description' => "Your swiftness rivals that of Aragorn himself. Cover 20 km in a single day and show the world your ranger-like endurance.",
								'short_description' => "Walk 20 km in a single day.",
								'trigger' => "distanceInOneDay >= 20",
								'icon' => 'power.png',
						],
						[
								'name' => 'Explorer of Middle-earth',
								'description' => "From the rolling hills to the barren lands, you’ve wandered every corner of Middle-earth. Walk in each terrain type.",
								'short_description' => "Walk in each terrain type.",
								'trigger' => "completedAllTerrains == true",
								'icon' => 'map.png',
						],
						[
								'name' => 'Stormwalker',
								'description' => "Like a true adventurer of Middle-earth, you've faced the elements head-on. Walk in every weather condition and let the storm be your ally.",
								'short_description' => "Walk in every weather condition.",
								'trigger' => "completedAllWeatherConditions == true",
								'icon' => 'weather.png',
						],
						[
								'name' => 'Brave Heart',
								'description' => "You’ve shown courage by traversing the marshes, much like Frodo in the Dead Marshes. Walk through 20 km of swampy terrain to prove your bravery.",
								'short_description' => "Walk 20 km in swampy terrain.",
								'trigger' => "swampyTerrain >= 20",
								'icon' => 'heart-plus.png',
						],
						[
								'name' => 'Gollum’s Guide',
								'description' => "Like Gollum, you’ve ventured into the dark on a relentless pursuit. Complete a multi-day journey lasting at least 2 days.",
								'short_description' => "Complete a multi-day journey.",
								'trigger' => "multiDayTripDuration >= 2",
								'icon' => 'tent.png',
						],
						[
								'name' => 'Watcher of the Waters',
								'description' => "The rivers and lakes of Middle-earth have witnessed your journey. Walk at least 20 km near these waters, and they will remember your name.",
								'short_description' => "Walk 20 km near water.",
								'trigger' => "waterProximityDistance >= 20",
								'icon' => 'waterfall.png',
						],
						[
								'name' => 'Woodland Sanctuary',
								'description' => "Much like the ancient Ents provided sanctuary to the Hobbits, the forests have sheltered you. Take refuge in the woods during a multi-day journey.",
								'short_description' => "Shelter in the woods during a multi-day journey.",
								'trigger' => "forestShelterDuringMultiDayTrip == true",
								'icon' => 'forest.png',
						],
						[
								'name' => 'Stealthy Traveler',
								'description' => "Your movements have been as silent as the Rangers of the North. Log a day with over 5 km walked but without any terrain details, keeping your path a secret.",
								'short_description' => "Walk 5 km without terrain details.",
								'trigger' => "distanceWithNoDetails >= 5",
								'icon' => 'moon.png',
						],
						[
								'name' => 'Unexpected Party',
								'description' => "Like Bilbo’s unexpected party, you’ve embarked on a journey on a special occasion. Log an entry on a significant date to unlock this.",
								'short_description' => "Log an entry on a special date.",
								'trigger' => "loggedOnSpecialDate == true",
								'icon' => 'party.png',
						],
						[
								'name' => 'Trailblazer',
								'description' => "With unwavering dedication, you’ve walked seven consecutive days. Much like a pioneer, you’ve blazed your trail across Middle-earth.",
								'short_description' => "Walk seven consecutive days.",
								'trigger' => "consecutiveDaysWalking >= 7",
								'icon' => 'flame.png',
						],
						[
								'name' => 'Master of the Log',
								'description' => "Your meticulous record-keeping is akin to the wisdom of the Elves. Log detailed entries (terrain, weather, and notes) for at least 10 trips.",
								'short_description' => "Log 10 detailed entries to Travel log.",
								'trigger' => "detailedLogEntries >= 10",
								'icon' => 'notes.png',
						],
						[
								'name' => 'Seasoned Traveler',
								'description' => "You’ve journeyed through every season, witnessing Middle-earth’s beauty in all its forms. Log entries across all four seasons to claim this title.",
								'short_description' => "Log entries in all four seasons.",
								'trigger' => "completedAllSeasons == true",
								'icon' => 'seasons.png',
						],
				];

				DB::table('achievements')->insert($achievements);
    }
}
