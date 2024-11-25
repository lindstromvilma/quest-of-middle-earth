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
				Schema::create('distance_logs', function (Blueprint $table) {
						$table->id();
						$table->foreignId('user_id')->constrained()->onDelete('cascade');
						$table->decimal('distance', 8, 2);
						$table->timestamp('date')->useCurrent();
						$table->timestamps();
				});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distance_logs');
    }
};
