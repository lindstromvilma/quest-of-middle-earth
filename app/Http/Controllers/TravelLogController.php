<?php

namespace App\Http\Controllers;

use App\Models\TravelLog;
use App\Models\Milestone;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TravelLogController extends Controller
{

		/**
		 * Add the user's traveled distance and store the travel log entry.
		 *
		 * @param Request $request
		 * @return \Inertia\Response
		 */
		public function addTravelLogEntry(Request $request)
		{
		    $request->validate([
		        'distance' => 'required|numeric|min:0',
		        'isMultiDay' => 'required|boolean',
		        'date' => 'required_if:isMultiDay,false|nullable|date_format:d-m-Y',
		        'dateRange' => 'required_if:isMultiDay,true|array',
		        'dateRange.*' => 'date_format:d-m-Y',
		        'terrain' => 'nullable|string',
						'weather' => 'nullable|string',
						'sleptOutside' => 'nullable|boolean',
						'cookedOnFire' => 'nullable|boolean',
						'notes' => 'nullable|string',
		    ]);

		    $user = $request->user();
		    $distance = $request->input('distance');
		    $is_multi_day = $request->input('isMultiDay');
		    $date = $request->input('date');
		    $date_range = $request->input('dateRange');
				$terrain = $request->input('terrain');
				$weather = $request->input('weather');
				$slept_outside = $request->input('sleptOutside');
				$cooked_on_fire = $request->input('cookedOnFire');
				$notes = $request->input('notes');

		    // Convert dates to Y-m-d format
		    $date = !$is_multi_day ? \DateTime::createFromFormat('d-m-Y', $date)->format('Y-m-d') : null;
		    $start_date = $is_multi_day ? \DateTime::createFromFormat('d-m-Y', $date_range[0])->format('Y-m-d') : null;
		    $end_date = $is_multi_day ? \DateTime::createFromFormat('d-m-Y', $date_range[1])->format('Y-m-d') : null;

		    $user->addDistance($distance);

		    // Store the travel log
		    TravelLog::create([
		        'user_id' => $user->id,
		        'distance' => $distance,
		        'date' => $date,
		        'start_date' => $start_date,
		        'end_date' => $end_date,
		        'is_multi_day' => $is_multi_day,
						'terrain' => $terrain,
						'weather' => $weather,
						'slept_outside' => $slept_outside,
						'cooked_on_fire' => $cooked_on_fire,
						'notes' => $notes,
		    ]);

		    // Fetch all terrain data
		    $terrains = Terrain::all();

		    return Inertia::render('Dashboard', [
		        'traveledDistance' => $user->traveled_distance,
		        'currentMilestone' => Milestone::getCurrentMilestone($user),
		        'nextMilestone' => Milestone::getNextMilestone($user),
		        'remainingDistanceToNextMilestone' => Milestone::getRemainingDistanceToNextMilestone($user),
		        'remainingDistanceToGoal' => Milestone::getRemainingDistanceToGoal($user),
		        'terrains' => $terrains,
		    ]);
		}

		/**
		 * Delete a travel log entry.
		 *
		 * @param int $id
		 * @return \Inertia\Response
		 */
		public function deleteTravelLogEntry($id)
		{
		    $log = TravelLog::findOrFail($id);
		    $user = $log->user;

				$user->removeDistance($log->distance);

		    $log->delete(); // Delete the travel log entry

		    // Recalculate milestones and distances
		    $currentMilestone = Milestone::getCurrentMilestone($user);
		    $nextMilestone = Milestone::getNextMilestone($user);
		    $remainingDistanceToNextMilestone = $nextMilestone ? $nextMilestone->total_distance_at_milestone - $user->traveled_distance : 0;
		    $finalGoal = Milestone::orderBy('total_distance_at_milestone', 'desc')->first();
		    $remainingDistanceToGoal = $finalGoal ? $finalGoal->total_distance_at_milestone - $user->traveled_distance : 0;

		    return Inertia::render('Dashboard', [
		        'currentMilestone' => $currentMilestone,
		        'nextMilestone' => $nextMilestone,
		        'remainingDistanceToNextMilestone' => $remainingDistanceToNextMilestone,
		        'remainingDistanceToGoal' => $remainingDistanceToGoal,
		        'travelLog' => TravelLog::where('user_id', $user->id)->orderBy('date', 'desc')->get(),
		        'terrains' => Terrain::all(),
		    ]);
		}
}
