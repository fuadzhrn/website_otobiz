<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSimulationContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'intro_text',
        'daily_deposit_label',
        'operating_days_label',
        'operating_cost_label',
        'installment_label',
        'result_total_operational_label',
        'result_net_profit_label',
        'result_partner_share_label',
        'result_otobiz_share_label',
        'partner_share_percentage',
        'otobiz_share_percentage',
    ];

    protected function casts(): array
    {
        return [
            'partner_share_percentage' => 'integer',
            'otobiz_share_percentage' => 'integer',
        ];
    }
}
