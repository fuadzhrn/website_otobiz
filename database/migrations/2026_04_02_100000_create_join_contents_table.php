<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('join_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge_one')->nullable();
            $table->string('hero_badge_two')->nullable();
            $table->string('hero_badge_three')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_link')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_link')->nullable();
            $table->string('registration_section_title')->nullable();
            $table->text('registration_section_description')->nullable();
            $table->text('registration_form_note')->nullable();
            $table->text('registration_checkbox_text')->nullable();
            $table->string('selection_section_title')->nullable();
            $table->text('selection_section_description')->nullable();
            $table->text('selection_section_note')->nullable();
            $table->string('sales_section_title')->nullable();
            $table->text('sales_section_description')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_primary_button_link')->nullable();
            $table->string('cta_secondary_button_text')->nullable();
            $table->string('cta_secondary_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_contents');
    }
};
