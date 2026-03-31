<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_primary_button_text')->nullable();
            $table->string('hero_primary_button_link')->nullable();
            $table->string('hero_secondary_button_text')->nullable();
            $table->string('hero_secondary_button_link')->nullable();
            $table->string('hero_trust_text')->nullable();
            $table->string('packages_section_kicker')->nullable();
            $table->string('packages_section_title')->nullable();
            $table->text('packages_section_description')->nullable();
            $table->text('packages_section_note')->nullable();
            $table->string('units_section_kicker')->nullable();
            $table->string('units_section_title')->nullable();
            $table->text('units_section_description')->nullable();
            $table->string('specs_section_kicker')->nullable();
            $table->string('specs_section_title')->nullable();
            $table->text('specs_section_description')->nullable();
            $table->string('simulation_section_kicker')->nullable();
            $table->string('simulation_section_title')->nullable();
            $table->text('simulation_section_description')->nullable();
            $table->text('simulation_disclaimer')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_primary_button_link')->nullable();
            $table->string('cta_secondary_button_text')->nullable();
            $table->string('cta_secondary_button_link')->nullable();
            $table->string('cta_third_button_text')->nullable();
            $table->string('cta_third_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_contents');
    }
};
