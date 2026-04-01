<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'unit_type',
        'status',
        'short_description',
        'energy_type',
        'capacity',
        'operational_use',
        'main_advantages',
        'main_image',
        'badge_text',
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

    public function galleries(): HasMany
    {
        return $this->hasMany(ProductUnitGallery::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(ProductPackage::class);
    }
}
