<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_type')->nullable();
            $table->string('title');
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('operation_hours')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_locations');
    }
};
