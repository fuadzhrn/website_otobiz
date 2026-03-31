<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MekanismeFlowStepPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'mekanisme_flow_step_id',
        'point_text',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function flowStep(): BelongsTo
    {
        return $this->belongsTo(MekanismeFlowStep::class, 'mekanisme_flow_step_id');
    }
}
