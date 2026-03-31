<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_unit_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_unit_id')->constrained('product_units')->cascadeOnDelete();
            $table->text('image_path');
            $table->string('alt_text')->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_unit_galleries');
    }
};
