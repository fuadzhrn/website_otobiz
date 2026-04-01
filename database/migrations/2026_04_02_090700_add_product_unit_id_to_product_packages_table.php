<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_packages', function (Blueprint $table) {
            if (!Schema::hasColumn('product_packages', 'product_unit_id')) {
                $table->foreignId('product_unit_id')->nullable()->after('id')->constrained('product_units')->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('product_packages', function (Blueprint $table) {
            if (Schema::hasColumn('product_packages', 'product_unit_id')) {
                $table->dropForeign(['product_unit_id']);
                $table->dropColumn('product_unit_id');
            }
        });
    }
};
