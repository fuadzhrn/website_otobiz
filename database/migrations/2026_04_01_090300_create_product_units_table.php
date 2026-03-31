<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('status')->nullable();
            $table->text('short_description')->nullable();
            $table->string('energy_type')->nullable();
            $table->string('capacity')->nullable();
            $table->string('operational_use')->nullable();
            $table->text('main_advantages')->nullable();
            $table->text('main_image')->nullable();
            $table->string('badge_text')->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_units');
    }
};
