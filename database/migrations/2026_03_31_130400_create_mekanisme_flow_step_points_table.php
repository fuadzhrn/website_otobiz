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
        Schema::create('mekanisme_flow_step_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mekanisme_flow_step_id')->constrained('mekanisme_flow_steps')->cascadeOnDelete();
            $table->text('point_text');
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mekanisme_flow_step_points');
    }
};
