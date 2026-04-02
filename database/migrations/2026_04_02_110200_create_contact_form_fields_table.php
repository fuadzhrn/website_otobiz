<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_form_fields', function (Blueprint $table) {
            $table->id();
            $table->string('field_key')->unique();
            $table->string('label');
            $table->string('field_type', 30);
            $table->string('placeholder')->nullable();
            $table->json('options_json')->nullable();
            $table->unsignedInteger('sort_order')->default(1);
            $table->boolean('is_required')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_form_fields');
    }
};
