<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_simulation_contents', function (Blueprint $table) {
            $table->id();
            $table->text('intro_text')->nullable();
            $table->string('daily_deposit_label')->nullable();
            $table->string('operating_days_label')->nullable();
            $table->string('operating_cost_label')->nullable();
            $table->string('installment_label')->nullable();
            $table->string('result_total_operational_label')->nullable();
            $table->string('result_net_profit_label')->nullable();
            $table->string('result_partner_share_label')->nullable();
            $table->string('result_otobiz_share_label')->nullable();
            $table->unsignedTinyInteger('partner_share_percentage')->default(60);
            $table->unsignedTinyInteger('otobiz_share_percentage')->default(40);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_simulation_contents');
    }
};
