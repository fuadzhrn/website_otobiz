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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('intro_kicker')->nullable();
            $table->string('intro_section_title')->nullable();
            $table->text('intro_description')->nullable();
            $table->text('intro_subtext')->nullable();
            $table->string('vision_section_title')->nullable();
            $table->string('vision_section_subtitle')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('mission_section_title')->nullable();
            $table->string('values_section_kicker')->nullable();
            $table->string('values_section_title')->nullable();
            $table->text('values_section_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
