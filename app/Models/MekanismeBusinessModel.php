<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MekanismeBusinessModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'item_type',
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

    public function points(): HasMany
    {
        return $this->hasMany(MekanismeBusinessModelPoint::class)
            ->where('is_active', true)
            ->orderBy('sort_order');
    }
}
