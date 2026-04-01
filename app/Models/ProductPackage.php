<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_unit_id',
        'name',
        'category',
        'badge_text',
        'is_popular',
        'partnership_price',
        'starting_price',
        'description',
        'cta_text',
        'cta_link',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_popular' => 'boolean',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(ProductPackageBenefit::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(ProductUnit::class, 'product_unit_id');
    }
}
