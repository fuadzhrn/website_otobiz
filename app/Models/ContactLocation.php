<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_type',
        'title',
        'address',
        'description',
        'operation_hours',
        'button_text',
        'button_link',
        'icon',
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
}
