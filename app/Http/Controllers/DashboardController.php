<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\TravelLog;
use App\Models\Terrain;
use App\Models\Achievement;
use App\Http\Controllers\AchievementController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
		protected $achievementController;

		public function __construct(AchievementController $achievementController)
		{
				$this->achievementController = $achievementController;
		}

    /**
     * Show the dashboard with the necessary data.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
		{
		    $user = $request->user();

		    // Fetch all milestones
		    $milestones = Milestone::orderBy('total_distance_at_milestone')->get();

		    // Get the traveled distance from the user
		    $traveledDistance = $user->traveled_distance;

		    // Find the current milestone (the most recent milestone the user has passed)
		    $currentMilestone = Milestone::getCurrentMilestone($user);

		    // Find the next milestone based on the traveled distance
		    $nextMilestone = Milestone::getNextMilestone($user);

		    // Calculate the remaining distance to the next milestone
		    $remainingDistanceToNextMilestone = $nextMilestone ? $nextMilestone->total_distance_at_milestone - $traveledDistance : 0;

		    // Calculate the distance to the final goal (the last milestone)
		    $finalGoal = $milestones->last();
		    $remainingDistanceToGoal = $finalGoal ? $finalGoal->total_distance_at_milestone - $traveledDistance : 0;

		    // Get users Travel log
		    $travelLog = TravelLog::where('user_id', $user->id)
		        ->orderBy('date', 'desc')
		        ->get();

		    $terrains = Terrain::all(); // Get all terrains

				$achievements = Achievement::all(); // Get all achievements
				$userAchievements = $user->achievements; // Get the user's achievements

				// Determine new achievements unlocked
        $newAchievements = $this->achievementController->checkAndAwardAchievements($travelLog);

		    return Inertia::render('Dashboard', [
						'milestones' => $milestones,
		        'currentMilestone' => $currentMilestone,
		        'nextMilestone' => $nextMilestone,
		        'remainingDistanceToNextMilestone' => $remainingDistanceToNextMilestone,
		        'remainingDistanceToGoal' => $remainingDistanceToGoal,
		        'travelLog' => $travelLog,
		        'terrains' => $terrains,
						'achievements' => $achievements,
						'userAchievements' => $userAchievements,
						'newAchievements' => $newAchievements,
		    ]);
		}
}
