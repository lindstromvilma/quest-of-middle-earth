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
						$table->string('weather')->nullable()->after('terrain');
						$table->text('notes')->nullable()->after('weather');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_logs', function (Blueprint $table) {
            $table->dropColumn('weather');
						$table->dropColumn('notes');
        });
    }
};
