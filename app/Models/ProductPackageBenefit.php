<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPackageBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_package_id',
        'benefit_text',
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

    public function package(): BelongsTo
    {
        return $this->belongsTo(ProductPackage::class, 'product_package_id');
    }
}
