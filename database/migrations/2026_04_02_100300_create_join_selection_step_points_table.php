<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('join_selection_step_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('join_selection_step_id')->constrained('join_selection_steps')->cascadeOnDelete();
            $table->string('point_text');
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_selection_step_points');
    }
};
