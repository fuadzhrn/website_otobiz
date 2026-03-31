<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MekanismeBusinessModelPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'mekanisme_business_model_id',
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

    public function businessModel(): BelongsTo
    {
        return $this->belongsTo(MekanismeBusinessModel::class, 'mekanisme_business_model_id');
    }
}
