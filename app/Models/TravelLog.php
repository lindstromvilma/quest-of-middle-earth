<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelLog extends Model
{
    use HasFactory;

		public $timestamps = false;

    protected $fillable = [
				'user_id',
				'distance',
				'terrain',
				'weather',
				'slept_outside',
				'cooked_on_fire',
				'notes',
				'date',
				'start_date',
				'end_date',
				'is_multi_day',
		];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
