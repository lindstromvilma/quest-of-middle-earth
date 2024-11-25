<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('travel_logs', function (Blueprint $table) {
						$table->boolean('slept_outside')->default(false)->after('weather');
						$table->boolean('cooked_on_fire')->default(false)->after('slept_outside');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_logs', function (Blueprint $table) {
            $table->dropColumn(['slept_outside', 'cooked_on_fire']);
        });
    }
};
