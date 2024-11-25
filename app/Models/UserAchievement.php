<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAchievement extends Pivot
{
    public $timestamps = false;

    protected $fillable = [
			'user_id',
			'achievement_id',
			'created_at'
		];
}