<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Milestone;
use App\Models\TravelLog;
use App\Models\Terrain;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AchievementController extends Controller
{
		/**
     * Check and award achievements to the user based on the travel log.
     *
     * @param Collection|TravelLog[] $travelLog
     * @return Achievement[]
     */
    public function checkAndAwardAchievements($travelLog = null)
    {
        $user = null;

        $travelLogCollection = $travelLog instanceof Collection ? $travelLog : collect($travelLog);

        // handle the case where travelLog is provided and not empty
        if ($travelLogCollection->isNotEmpty()) {
            $user = User::find($travelLogCollection->first()->user_id);

            if (!$user) {
                throw new \Exception('User not found for the provided travel log.');
            }
        }

        $achievements = Achievement::all();
        $newAchievements = [];

        foreach ($achievements as $achievement) {
            // skip if the user already has this achievement
            if ($user && $user->achievements->contains($achievement->id)) {
                continue;
            }

            // check if the achievement criteria are met and award user with achievement
            if ($this->meetsCriteria($achievement, $travelLogCollection)) {
                if ($user) {
                    $user->achievements()->attach($achievement->id, ['created_at' => now()]);
										$user->save();
                }

                $newAchievements[] = $achievement;
            }
        }

        return $newAchievements;
    }

		/**
     * Check if the criteria for a specific achievement is met.
     *
     * @param Achievement $achievement
     * @param Collection $travelLog
     * @return bool
     */
		protected function meetsCriteria($achievement, $travelLog)
		{
		    if ($travelLog->isNotEmpty() && is_iterable($travelLog)) {
		        $travelLogCollection = collect($travelLog);

		        // 'Baby steps' (totalEntries >= 1)
		        if ($achievement->name == 'Baby steps') {
		            return $travelLogCollection->count() >= 1;
		        }

		        // 'Ring-Bearer' (totalDistance >= 2420)
		        if ($achievement->name == 'Ring-Bearer') {
		            $totalDistance = $travelLogCollection->sum('distance');
		            return $totalDistance >= 2420;
		        }

		        // 'Fellowship of the Walk' (totalEntries >= 300)
		        if ($achievement->name == 'Fellowship of the Walk') {
		            return $travelLogCollection->count() >= 300;
		        }

		        // 'Through the Mines' (mountainousTerrain >= 50)
		        if ($achievement->name == 'Through the Mines') {
		            $mountainousTerrain = $travelLogCollection->where('terrain', 'mountainous')->sum('distance');
		            return $mountainousTerrain >= 50;
		        }

		        // 'Leaf of Lothlórien' (forestedTerrain >= 50)
		        if ($achievement->name == 'Leaf of Lothlórien') {
		            $forestedTerrain = $travelLogCollection->where('terrain', 'forested')->sum('distance');
		            return $forestedTerrain >= 50;
		        }

		        // 'Swift as a Ranger' (distanceInOneDay >= 20)
		        if ($achievement->name == 'Swift as a Ranger') {
		            return $travelLogCollection->firstWhere('distance', '>=', 20) !== null;
		        }

		        // 'Explorer of Middle-earth' (completedAllTerrains == true)
		        if ($achievement->name == 'Explorer of Middle-earth') {
		            $completedAllTerrains = $travelLogCollection->pluck('terrain')->unique()->count() == Terrain::count();
		            return $completedAllTerrains;
		        }

		        // 'Stormwalker' (completedAllWeatherConditions == true)
		        if ($achievement->name == 'Stormwalker') {
		            $completedAllWeatherConditions = $travelLogCollection->pluck('weather')->unique()->count() == 4;
		            return $completedAllWeatherConditions;
		        }

		        // 'Brave Heart' (swampyTerrain >= 20)
		        if ($achievement->name == 'Brave Heart') {
		            $swampyTerrain = $travelLogCollection->whereIn('terrain', ['Swamp', 'Marshy terrain'])->sum('distance');
		            return $swampyTerrain >= 20;
		        }

		        // 'Gollum’s Guide' (multiDayTripDuration >= 2)
		        if ($achievement->name == 'Gollum’s Guide') {
		            $multiDayTripDuration = $travelLogCollection->sum('multi_day_trip_duration'); // Assuming you store this duration in the TravelLog
		            return $multiDayTripDuration >= 2;
		        }

		        // 'Watcher of the Waters' (waterProximityDistance >= 20)
		        if ($achievement->name == 'Watcher of the Waters') {
		            $waterProximityDistance = $travelLogCollection->whereIn('terrain', ['Riverland', 'Waterfall', 'Wooded riverbank'])->sum('distance');
		            return $waterProximityDistance >= 20;
		        }

		        // 'Woodland Sanctuary' (forestShelterDuringMultiDayTrip == true)
		        if ($achievement->name == 'Woodland Sanctuary') {
		            $forestShelterDuringMultiDayTrip = $travelLogCollection->where('terrain', 'forested')
		                ->where('multi_day_trip_duration', '>=', 1)
		                ->isNotEmpty();
		            return $forestShelterDuringMultiDayTrip;
		        }

		        // 'Stealthy Traveler' (distanceWithNoDetails >= 5)
		        if ($achievement->name == 'Stealthy Traveler') {
		            $distanceWithNoDetails = $travelLogCollection->whereNull('terrain')->whereNull('weather')->sum('distance');
		            return $distanceWithNoDetails >= 5;
		        }

		        // 'Unexpected Party' (loggedOnSpecialDate == true)
		        if ($achievement->name == 'Unexpected Party') {
		            $specialDates = ['0103', '0325', '0922']; // Month-day format (e.g., March 25 = 0325)
		            $loggedOnSpecialDate = $travelLogCollection->pluck('date')->map(function ($date) {
		                return date('md', strtotime($date));
		            })->intersect($specialDates)->isNotEmpty();
		            return $loggedOnSpecialDate;
		        }

		        // 'Trailblazer' (consecutiveDaysWalking >= 7)
		        if ($achievement->name == 'Trailblazer') {
		            return $this->calculateConsecutiveDays($travelLogCollection) >= 7;
		        }

		        // 'Master of the Log' (detailedLogEntries >= 10)
		        if ($achievement->name == 'Master of the Log') {
		            $detailedLogEntries = $travelLogCollection->whereNotNull('terrain')->whereNotNull('weather')->count();
		            return $detailedLogEntries >= 10;
		        }

		        // 'Seasoned Traveler' (completedAllSeasons == true)
		        if ($achievement->name == 'Seasoned Traveler') {
		            return $this->hasLoggedAllSeasons($travelLogCollection);
		        }
		    }

		    return false;
		}

		/**
		 * Calculate the number of consecutive days the user has walked.
		 *
		 * @param User $user
		 * @return int
		 */
		protected function calculateConsecutiveDays($travelLog)
		{
		    if (!is_iterable($travelLog)) {
		        throw new \InvalidArgumentException('Expected $travelLogs to be iterable.');
		    }

		    $logs = $travelLog->sort()->pluck('date')->toArray();
		    $consecutiveDays = 0;
		    $maxConsecutive = 0;

		    for ($i = 1; $i < count($logs); $i++) {
		        $dateDiff = strtotime($logs[$i]) - strtotime($logs[$i - 1]);
		        if ($dateDiff == 86400) {
		            $consecutiveDays++;
		            $maxConsecutive = max($maxConsecutive, $consecutiveDays);
		        } else {
		            $consecutiveDays = 0;
		        }
		    }

		    return $maxConsecutive + 1;
		}

		/**
		 * Check if the user has logged travel entries for all seasons.
		 *
		 * @param TravelLog $travelLog
		 * @return bool
		 */
		protected function hasLoggedAllSeasons($travelLogs)
		{
		    $seasonsLogged = [
		        'Winter' => false,
		        'Spring' => false,
		        'Summer' => false,
		        'Autumn' => false,
		    ];

		    // ensure $travelLogs is a collection
		    if (!is_iterable($travelLogs)) {
		        throw new \InvalidArgumentException('Expected $travelLogs to be iterable.');
		    }

		    // fetch all dates from the travel logs
		    $dates = $travelLogs->pluck('date')->toArray();

		    foreach ($dates as $date) {
		        $season = $this->getSeasonFromDate($date);
		        $seasonsLogged[$season] = true;
		    }

		    // check if all seasons have been logged
		    return !in_array(false, $seasonsLogged);
		}

		/**
		 * Get the season from a given date.
		 *
		 * @param string $date
		 * @return string
		 */
		protected function getSeasonFromDate($date)
		{
		    $monthDay = date('md', strtotime($date)); // format as MMDD

		    // define season ranges
		    if ($monthDay >= '1221' || $monthDay <= '0320') {
		        return 'Winter';
		    } elseif ($monthDay >= '0321' && $monthDay <= '0620') {
		        return 'Spring';
		    } elseif ($monthDay >= '0621' && $monthDay <= '0922') {
		        return 'Summer';
		    } else {
		        return 'Autumn';
		    }
		}
}