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
			Schema::create('milestones', function (Blueprint $table) {
					$table->id();
					$table->string('name');
					$table->unsignedInteger('distance_to_next_milestone');
					$table->unsignedInteger('total_distance_at_milestone');
					$table->text('terrains');
					$table->text('description');
					$table->text('action');
					$table->timestamps();
			});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
