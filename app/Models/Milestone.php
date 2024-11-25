<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
			'id',
			'name',
			'distance_to_next_milestone',
			'total_distance_at_milestone',
			'terrains',
			'description',
			'action',
		];

		/**
		 * Get the current milestone based on the user's traveled distance.
		 *
		 * @param $user
		 * @return mixed
		 */
    public static function getCurrentMilestone($user)
		{
		    return Milestone::where('total_distance_at_milestone', '<=', $user->traveled_distance)
		        ->orderBy('total_distance_at_milestone', 'desc')
		        ->first();
		}

		/**
		 * Get the next milestone based on the user's traveled distance.
		 *
		 * @param $user
		 * @return mixed
		 */
    public static function getNextMilestone($user)
		{
		    return Milestone::where('total_distance_at_milestone', '>', $user->traveled_distance)
		        ->orderBy('total_distance_at_milestone')
		        ->first();
		}

		/**
		 * Get the remaining distance to the next milestone.
		 * If there is no next milestone, return 0.
		 *
		 * @param $user
		 * @return int
		 */
    public static function getRemainingDistanceToNextMilestone($user)
    {
        $nextMilestone = self::getNextMilestone($user);
        return $nextMilestone ? $nextMilestone->total_distance_at_milestone - $user->traveled_distance : 0;
    }

		/**
		 * Get the remaining distance to the final goal (the last milestone).
		 * If there is no final goal, return 0.
		 *
		 * @param $user
		 * @return int
		 */
    public static function getRemainingDistanceToGoal($user)
    {
        $milestones = Milestone::orderBy('total_distance_at_milestone')->get();
        $finalGoal = $milestones->last();
        return $finalGoal ? $finalGoal->total_distance_at_milestone - $user->traveled_distance : 0;
    }
}
