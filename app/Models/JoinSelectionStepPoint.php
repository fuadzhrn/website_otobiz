<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JoinSelectionStepPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'join_selection_step_id',
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

    public function step(): BelongsTo
    {
        return $this->belongsTo(JoinSelectionStep::class, 'join_selection_step_id');
    }
}
