<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
				'traveled_distance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

		/**
     * The achievements that belong to the user.
     */
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements')
            ->withPivot('created_at');
    }

		 /**
     * Get users traveled_distance.
     */
    public function getTraveledDistanceAttribute()
    {
        return $this->attributes['traveled_distance'];
    }

		/**
		 * Method to add distance to the user's traveled distance.
		 *
		 * @param int $distance
		 */
		public function addDistance($distance)
    {
				$distance = (float) $distance;

				$this->traveled_distance += $distance;
        $this->save();
    }

		/**
		 * Remove distance from the user's traveled distance.
		 *
		 * @param int $distance
		 */
		public function removeDistance($distance)
		{
				$distance = (float) $distance;

				$this->traveled_distance -= $distance;
				$this->save();
		}
}
