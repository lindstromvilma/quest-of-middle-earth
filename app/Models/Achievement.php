<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
		use HasFactory;

		protected $fillable = [
			'id',
			'name',
			'description',
			'short_description',
			'trigger',
			'icon',
		];

		/**
     * The users that have the achievement.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}