<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_package_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_package_id')->constrained('product_packages')->cascadeOnDelete();
            $table->string('benefit_text');
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_package_benefits');
    }
};
