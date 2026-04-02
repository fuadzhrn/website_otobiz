<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_small_button_text')->nullable();
            $table->string('hero_small_button_link')->nullable();
            $table->string('contact_form_title')->nullable();
            $table->text('contact_form_description')->nullable();
            $table->string('contact_form_submit_text')->nullable();
            $table->text('contact_form_checkbox_text')->nullable();
            $table->string('locations_section_title')->nullable();
            $table->string('support_section_title')->nullable();
            $table->text('support_section_description')->nullable();
            $table->text('support_highlight_text')->nullable();
            $table->text('closing_strip_text')->nullable();
            $table->string('closing_strip_button_text')->nullable();
            $table->string('closing_strip_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_contents');
    }
};
